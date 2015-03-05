<?php namespace SimdesApp\Repositories\RKPDES;

use SimdesApp\Models\Rkpdes;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class RkpdesRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Rkpdes $rkpdes
     * @param LaraCacheInterface $cache
     */
    public function __construct(Rkpdes $rkpdes, LaraCacheInterface $cache)
    {
        $this->model = $rkpdes;
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
        $key = 'rkpdes-find-' . $page . $limit . $term;

        // Create Section
        $section = 'rkpdes';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $rkpdes = $this->model
            ->where('kegiatan', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $rkpdes, 10);

        return $rkpdes;
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
            $rkpdes = $this->getNew();

            $rkpdes->rpjmdes_program_id = e($data['rpjmdes_program_id']);
            $rkpdes->dana_desa_id = e($data['dana_desa_id']);
            $rkpdes->tahun = e($data['tahun']);
            $rkpdes->lokasi = e($data['lokasi']);
            $rkpdes->anggaran = $data['anggaran'];
            $rkpdes->kegiatan = e($data['kegiatan']);
            $rkpdes->pejabat_desa_id = e($data['pejabat_desa_id']);
            $rkpdes->is_finish = $data['is_finish'];

            $rkpdes->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('RkpdesRepository create action something wrong -' . $ex);
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
            $rkpdes = $this->findById($id);

            $rkpdes->rpjmdes_program_id = e($data['rpjmdes_program_id']);
            $rkpdes->dana_desa_id = e($data['dana_desa_id']);
            $rkpdes->tahun = e($data['tahun']);
            $rkpdes->lokasi = e($data['lokasi']);
            $rkpdes->anggaran = $data['anggaran'];
            $rkpdes->kegiatan = e($data['kegiatan']);
            $rkpdes->pejabat_desa_id = e($data['pejabat_desa_id']);
            $rkpdes->is_finish = $data['is_finish'];

            $rkpdes->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('RkpdesRepository update action something wrong -' . $ex);
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
            $rkpdes = $this->findById($id);

            if ($rkpdes){
                $rkpdes->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('RkpdesRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * get jumlah desa
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getCountByDesa($organisasi_id)
    {
        // set key
        $key = 'rkpdes-get-count-by-desa' . $organisasi_id;

        // set section
        $section = 'rkpdes';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rkpdes = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->count();

        // store to cache
        $this->cache->put($section, $key, $rkpdes, 10);

        return $rkpdes;
    }

    /**
     * Get the RKPDes by program_rpjmdes_id
     *
     * @param      $organisasi_id
     * @param      $program_rpjmdes_id
     * @param int  $page
     * @param int  $limit
     * @param null $term
     *
     * @return mixed
     */
    public function getByProgram($organisasi_id, $program_rpjmdes_id, $page = 1, $limit = 10, $term = null)
    {
        // set key
        $key = 'rkpdes-get-program' . $program_rpjmdes_id . $page . $limit . $term;

        // set section
        $section = 'rkpdes';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rkpdes = $this->model
            ->orderBy('created_at', 'asc')
            ->where('organisasi_id', '=', $organisasi_id)
            ->where('program_rpjmdes_id', '=', $program_rpjmdes_id)
            ->FullTextSearch($term)
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $rkpdes, 10);

        return $rkpdes;
    }

    /**
     * Get List RKPDes by organisasi_id using on Belanja
     *      *
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListRkpdes($organisasi_id)
    {
        // set key
        $key = 'rkpdes-get-list' . $organisasi_id;

        // set section
        $section = 'rkpdes';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rkpdes = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->get(['_id', 'kegiatan_id'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $rkpdes, 3600);

        return $rkpdes;
    }

    /**
     * get rkpdes by organisasi id
     *
     * @param int  $page
     * @param int  $limit
     * @param null $term
     * @param      $organisasi_id
     *
     * @return mixed
     */
    public function getRkpdesByDesa($page = 1, $limit = 10, $term = null, $organisasi_id)
    {
        // set key
        $key = 'rkpdes-get-desa' . $page . $limit . $term . $organisasi_id;

        // set section
        $section = 'rkpdes';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rkpdes = $this->model
            ->orderBy('created_at', 'asc')
            ->where('organisasi_id', '=', $organisasi_id)
            ->FullTextSearch($term)
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $rkpdes, 10);

        return $rkpdes;
    }

    /**
     * find by rpjmdes program
     *
     * @param int  $page
     * @param int  $limit
     * @param null $term
     * @param      $rpjmdes_program_id
     *
     * @return mixed
     */
    public function findByRpjmdesProgram($page = 1, $limit = 10, $term = null, $rpjmdes_program_id)
    {
        // set key
        $key = 'rkpdes-find-by-rpjmdes-program' . $page . $limit . $term . $rpjmdes_program_id;

        // set section
        $section = 'rkpdes';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rkpdes = $this->model
            ->orderBy('created_at', 'asc')
            ->where('program_rpjmdes_id', '=', $rpjmdes_program_id)
            ->where('is_finish', '=', 2)
            ->FullTextSearch($term)
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $rkpdes, 10);

        return $rkpdes;
    }
}
