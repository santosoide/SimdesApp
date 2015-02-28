<?php namespace SimdesApp\Repositories\Kewenangan;

use SimdesApp\Models\Kewenangan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Bidang\BidangRepository;
use SimdesApp\Services\LaraCacheInterface;

class KewenanganRepository extends AbstractRepository {

    /**
     * @var BidangRepository
     */
    protected $bidang;

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * instance interface
     *
     * @param Kewenangan      $kewenangan
     * @param BidangRepository $bidang
     * @param LaraCacheInterface  $cache
     */
    public function __construct(Kewenangan $kewenangan, BidangRepository $bidang, LaraCacheInterface $cache)
    {
        $this->model = $kewenangan;
        $this->bidang = $bidang;
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
        $key = 'kewenangan-find-' . $page . $limit . $term;

        // Create Section
        $section = 'kewenangan';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $kewenangan = $this->model
            ->orderBy('kode_rekening', 'asc')
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $kewenangan, 10);

        return $kewenangan;
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
            $kewenangan = $this->getNew();

            $kewenangan->kode_rekening = e($data['kode_rekening']);
            $kewenangan->kewenangan = e($data['kewenangan']);

            $kewenangan->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('KewenanganRepository create action something wrong -' . $ex);
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
            $kewenangan = $this->findById($id);

            $kewenangan->kode_rekening = e($data['kode_rekening']);
            $kewenangan->kewenangan = e($data['kewenangan']);

            $kewenangan->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('KewenanganRepository update action something wrong -' . $ex);
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
            $kewenangan = $this->findById($id);

            if ($kewenangan) {
                $result = $this->cekForDelete($kewenangan->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }

                $kewenangan->delete();

                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('KewenanganRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * check bidang before delete
     *
     * @todo check
     *
     * @param $kewenangan_id
     *
     * @return mixed
     */
    public function cekForDelete($kewenangan_id)
    {
        return $this->bidang->findIsExists($kewenangan_id);
    }

    /**
     * Get the list of Organisasi using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getList()
    {
        // set key
        $key = 'kewenangan-list';

        // set section
        $section = 'kewenangan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $kewenangan = $this->model
            ->get(['_id', 'kode_rekening', 'kewenangan'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $kewenangan, 3600);

        return $kewenangan;
    }
}
