<?php namespace SimdesApp\Repositories\PejabatDesa;

use SimdesApp\Models\PejabatDesa;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class PejabatDesaRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

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
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null)
    {
        // Create Key for cache
        $key = 'find-pejabat_desa-' . $page . $limit . $term;

        // Create Section
        $section = 'pejabat_desa';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $pejabatDesa = $this->model
            ->where('nama', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $pejabatDesa, $limit);

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
            $pejabatDesa->organisasi_id = e($data['organisasi_id']);
            $pejabatDesa->user_id = e($data['user_id']);
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

            $pejabatDesa->nama = e($data['nama']);
            $pejabatDesa->jabatan = e($data['jabatan']);
            $pejabatDesa->organisasi_id = e($data['organisasi_id']);
            $pejabatDesa->user_id = e($data['user_id']);
            $pejabatDesa->fungsi = e($data['fungsi']);
            $pejabatDesa->level = $data['level'];

            $pejabatDesa->save();

            // Return result success
            return $this->successUpdateResponse();

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

            if ($pejabatDesa){
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

}
