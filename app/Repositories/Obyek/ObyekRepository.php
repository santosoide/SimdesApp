<?php namespace SimdesApp\Repositories\Obyek;

use SimdesApp\Models\Obyek;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Contracts\ObyekInterface;
use SimdesApp\Services\LaraCacheInterface;

class ObyekRepository extends AbstractRepository implements ObyekInterface
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Obyek              $obyek
     * @param LaraCacheInterface $cache
     */
    public function __construct(Obyek $obyek, LaraCacheInterface $cache)
    {
        $this->model = $obyek;
        $this->cache = $cache;
    }

    /**
     * Instant find or search with paging, limit, and query
     *
     * @param int  $page
     * @param int  $limit
     * @param null $term
     *
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null)
    {
        // Create Key for cache
        $key = 'obyek-find-' . $page . $limit . $term;
        // Create Section
        $section = 'obyek';
        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }
        // Search data
        $obyek = $this->model
            ->orderBy('kode_rekening', 'asc')
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();
        // Create cache
        $this->cache->put($section, $key, $obyek, 10);

        return $obyek;
    }

    /**
     * Create data
     *
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $obyek = $this->getNew();
            $obyek->kode_rekening = e($data['kode_rekening']);
            $obyek->jenis_id = $data['jenis_id'];
            $obyek->obyek = e($data['obyek']);
            $obyek->organisasi_id = $this->getOrganisasiId();
            $obyek->save();

            /*Return result success*/

            return $this->successInsertResponse();
        } catch (\Exception $ex) {
            \Log::error('ObyekRepository create action something wrong -' . $ex);

            return $this->errorInsertResponse();
        }
    }

    /**
     * Show the Record
     *
     * @param $id
     *
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the Record
     *
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $obyek = $this->findById($id);
            if ($obyek) {
                $obyek->kode_rekening = e($data['kode_rekening']);
                $obyek->jenis_id = $data['jenis_id'];
                $obyek->obyek = e($data['obyek']);
                $obyek->save();

                // Return result success
                return $this->successUpdateResponse();
            }

            return $this->emptyDeleteResponse();
        } catch (\Exception $ex) {
            \Log::error('ObyekRepository update action something wrong -' . $ex);

            return $this->errorUpdateResponse();
        }
    }

    /**
     * Destroy the Record
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $obyek = $this->findById($id);
            if ($obyek) {
                $result = $this->cekForDelete($obyek->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }
                $obyek->delete();

                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();
        } catch (\Exception $ex) {
            \Log::error('ObyekRepository destroy action something wrong -' . $ex);

            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get obyek filter by id
     *
     * @param $id
     *
     * @return mixed
     */
    public function getNamaObyek($id)
    {
        $data = $this->findById($id);

        return $data->obyek;
    }

    /**
     * Get kode rekening
     *
     * @param $id
     *
     * @return mixed
     */
    public function getKodeRekening($id)
    {
        $data = $this->findById($id);

        return $data->kode_rekening;
    }

    /**
     * @param $jenis_id
     *
     * @return mixed
     */
    public function findIsExists($jenis_id)
    {
        return $this->model
            ->where('jenis_id', '=', $jenis_id)
            ->get();
    }

    /**
     * check jenis before delete
     *
     * @param $kelompok_id
     *
     * @return mixed
     */
    public function cekForDelete($kelompok_id)
    {
        return $this->jenis->findIsExists($kelompok_id);
    }

    /**
     * Get Obyek list using by Ajax Dropdown Accessing by Global User
     *
     * @param $jenis_id
     *
     * @return mixed
     */
    public function getListObyek($jenis_id)
    {
        // set key
        $key = 'obyek-list' . $jenis_id;
        // set section
        $section = 'obyek';
        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }
        // query to database
        $obyek = $this->model
            ->where('jenis_id', '=', $jenis_id)
            ->get(['_id', 'kode_rekening', 'jenis_id', 'obyek'])
            ->toArray();
        // store to cache
        $this->cache->put($section, $key, $obyek, 3600);

        return $obyek;
    }

    /**
     * Get Obyek list using by Ajax Dropdown Accessing by Global Desa
     *
     * @param $jenis_id
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListObyekDesa($jenis_id, $organisasi_id)
    {
        // set key
        $key = 'obyek-list-desa' . $jenis_id . $organisasi_id;
        // set section
        $section = 'obyek';
        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }
        // query to database
        $obyek = $this->model
            ->where('jenis_id', '=', $jenis_id)
            ->where('organisasi_id', $organisasi_id)
            ->orWhere('organisasi_id', null)
            ->get(['_id', 'kode_rekening', 'jenis_id', 'obyek'])
            ->toArray();
        // store to cache
        $this->cache->put($section, $key, $obyek, 3600);

        return $obyek;
    }
}
