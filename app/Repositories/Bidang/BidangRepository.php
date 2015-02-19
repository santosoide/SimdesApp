<?php namespace SimdesApp\Repositories\Bidang;

use SimdesApp\Models\Bidang;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class BidangRepository extends AbstractRepository {

    protected $cache;

    public function __construct(Bidang $bidang, LaraCacheInterface $cache)
    {
        $this->model = $bidang;
        $this->cache = $cache;
    }

    public function find($page = 1, $limit = 10, $term = null)
    {
        // Create Key for cache
        $key = 'find-obyek-' . $page . $limit . $term;

        // Create Section
        $section = 'obyek';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $bidang = $this->model
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $bidang, $limit);

        return $bidang;
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
            $bidang = $this->getNew();

            $bidang->kode_rekening = e($data['kode_rekening']);
            $bidang->fungsi_id = $data['fungsi_id'];
            $bidang->bidang = e($data['bidang']);

            $bidang->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('BidangRepository create action something wrong -' . $ex);
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
            $bidang = $this->findById($id);

            $bidang->kode_rekening = e($data['kode_rekening']);
            $bidang->fungsi_id = $data['fungsi_id'];
            $bidang->bidang = e($data['bidang']);

            $bidang->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('BidangRepository update action something wrong -' . $ex);
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
            $bidang = $this->findById($id);

            $bidang->delete();

            /*Return result success*/
            return $this->successDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('BidangRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}
