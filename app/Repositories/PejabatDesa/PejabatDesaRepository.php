<?php namespace SimdesApp\Repositories\PejabatDesa;

use SimdesApp\Models\PejabatDesa;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Contracts\PejabatDesaInterface;
use SimdesApp\Services\LaraCacheInterface;

class PejabatDesaRepository extends AbstractRepository implements PejabatDesaInterface
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param PejabatDesa $pejabatDesa
     * @param LaraCacheInterface $cache
     */
    public function __construct(PejabatDesa $pejabatDesa, LaraCacheInterface $cache)
    {
        $this->model = $pejabatDesa;
        $this->cache = $cache;
    }

    /**
     * Instant find or search with paging, limit, and query
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @param $organisasi_id
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null, $organisasi_id)
    {
        // Create Key for cache
        $key = 'pejabat-desa-find-' . $page . $limit . $term . $organisasi_id;

        // Create Section
        $section = 'pejabat-desa';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $pejabatDesa = $this->model
            ->orderBy('created_at', 'desc')
            ->where('organisasi_id', $organisasi_id)
            ->where('nama', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $pejabatDesa, 10);

        return $pejabatDesa;
    }

    /**
     * Create data
     *
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $pejabatDesa = $this->getNew();

            $pejabatDesa->nama = e($data['nama']);
            $pejabatDesa->jabatan = e($data['jabatan']);
            $pejabatDesa->fungsi = e($data['fungsi']);
            $pejabatDesa->level = $data['level'];

            $pejabatDesa->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('PejabatDesaRepository create action something wrong -' . $ex);
            return $this->errorInsertResponse();
        }
    }

    /**
     * Show the Record
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the record
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $pejabatDesa = $this->findById($id);
            if($pejabatDesa) {
                $pejabatDesa->nama = e($data['nama']);
                $pejabatDesa->jabatan = e($data['jabatan']);
                $pejabatDesa->fungsi = e($data['fungsi']);
                $pejabatDesa->level = $data['level'];

                $pejabatDesa->save();

                // Return result success
                return $this->successUpdateResponse();
            }

            return $this->emptyDeleteResponse();
        } catch (\Exception $ex) {
            \Log::error('PejabatDesaRepository update action something wrong -' . $ex);
            return $this->errorUpdateResponse();
        }
    }

    /**
     * Destroy the record
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $pejabatDesa = $this->findById($id);

            if ($pejabatDesa) {
                $pejabatDesa->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('PejabatDesaRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get the list pejabat desa by organisasi_id using on detil organisasi
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function listByOrganisasiId($organisasi_id)
    {
        // set key
        $key = 'pejabat-desa-list-organisasi' . $organisasi_id;

        // set section
        $section = 'pejabat-desa';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pejabatdesa = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->paginate(10)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $pejabatdesa, 3600);

        return $pejabatdesa;
    }

    /**
     * Get the list pejabat desa by organisasi_id using on rpjmdes_program
     *
     * @param $organisasi_id
     * @return mixed
     */
    public function getListByOrganisasiId($organisasi_id)
    {
        // set key
        $key = 'pejabat-desa-get-organisasi' . $organisasi_id;

        // set section
        $section = 'pejabat-desa';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pejabatdesa = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->get(['_id', 'nama', 'jabatan'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $pejabatdesa, 3600);

        return $pejabatdesa;
    }
}
