<?php namespace SimdesApp\Repositories\Akun;

use SimdesApp\Models\Akun;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Contracts\AkunInterface;
use SimdesApp\Repositories\Contracts\KelompokInterface;
use SimdesApp\Repositories\Kelompok\KelompokRepository;
use SimdesApp\Services\LaraCacheInterface;

class AkunRepository extends AbstractRepository implements AkunInterface
{

    /**
     * @var KelompokRepository
     */
    protected $kelompok;

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * create instance interface
     *
     * @param Akun               $akun
     * @param KelompokInterface  $kelompok
     * @param LaraCacheInterface $cache
     */
    public function __construct(Akun $akun, KelompokInterface $kelompok, LaraCacheInterface $cache)
    {
        $this->model = $akun;
        $this->kelompok = $kelompok;
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
        $key = 'akun-find-' . $page . $limit . $term;
        // Create Section
        $section = 'akun';
        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }
        // Search data
        $organisasi = $this->model
            ->orderBy('kode_rekening', 'asc')
            ->where('akun', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();
        // Create cache
        $this->cache->put($section, $key, $organisasi, 10);

        return $organisasi;
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
            $akun = $this->getNew();
            $akun->kode_rekening = e($data['kode_rekening']);
            $akun->akun = e($data['akun']);
            $akun->save();

            //Return result success
            return $this->successInsertResponse();
        } catch (\Exception $ex) {
            \Log::error('AkunRepository create action something wrong -' . $ex);

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
     * Update the record
     *
     * @param       $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $akun = $this->findById($id);
            $akun->kode_rekening = e($data['kode_rekening']);
            $akun->akun = e($data['akun']);
            $akun->save();

            /*Return result success*/

            return $this->successUpdateResponse();
        } catch (\Exception $ex) {
            \Log::error('AkunRepository update action something wrong -' . $ex);

            return $this->errorUpdateResponse();
        }
    }

    /**
     * Destroy the record
     *
     * @param $id
     *
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $akun = $this->findById($id);
            if ($akun) {
                $result = $this->cekForDelete($akun->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }
                $akun->delete();

                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();
        } catch (\Exception $ex) {
            \Log::error('AkunRepository destroy action something wrong -' . $ex);

            return $this->errorDeleteResponse();
        }
    }

    /**
     * check kelompok before delete
     *
     * @param $akun_id
     *
     * @return mixed
     */
    public function cekForDelete($akun_id)
    {
        return $this->kelompok->findIsExists($akun_id);
    }

    /**
     * Get the list of Akun using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getListAkun()
    {
        // set key
        $key = 'akun-list';
        // set section
        $section = 'akun';
        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }
        // query to database
        $akun = $this->model
            ->get(['_id', 'akun', 'kode_rekening'])
            ->toArray();
        // store to cache
        $this->cache->put($section, $key, $akun, 3600);

        return $akun;
    }
}
