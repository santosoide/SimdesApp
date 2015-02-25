<?php namespace SimdesApp\Repositories\SumberDana;

use SimdesApp\Models\SumberDana;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class SumberDanaRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param SumberDana $sumberDana
     * @param LaraCacheInterface $cache
     */
    public function __construct(SumberDana $sumberDana, LaraCacheInterface $cache)
    {
        $this->model = $sumberDana;
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
        $key = 'sumber_dana-find-' . $page . $limit . $term;

        // Create Section
        $section = 'sumber-dana';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $sumberDana = $this->model
            ->where('sumber_dana', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $sumberDana, 10);

        return $sumberDana;
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
            $sumberDana = $this->getNew();

            $sumberDana->sumber_dana = e($data['sumber_dana']);

            $sumberDana->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('SumberDanaRepository create action something wrong -' . $ex);
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
            $sumberDana = $this->findById($id);

            $sumberDana->sumber_dana = e($data['sumber_dana']);

            $sumberDana->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('SumberDanaRepository update action something wrong -' . $ex);
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
            $sumberDana = $this->findById($id);

            if ($sumberDana){
                $sumberDana->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('SumberDanaRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get list sumber dana for ajax
     *
     * @return mixed
     */
    public function getList()
    {
        // set key
        $key = 'sumber-dana-list';

        // set section
        $section = 'sumber-dana';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $sumberdana = $this->model
            ->get(['_id', 'sumber_dana'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $sumberdana, 3600);

        return $sumberdana;
    }
}
