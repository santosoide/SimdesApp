<?php namespace SimdesApp\Repositories\RPJMDES;

use SimdesApp\Models\Rpjmdes;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class RpjmdesRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    public function __construct(Rpjmdes $rpjmdes, LaraCacheInterface $cache)
    {
        $this->model = $rpjmdes;
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
        $key = 'find-rpjmdes-' . $page . $limit . $term;

        // Create Section
        $section = 'rpjmdes';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $rpjmdes = $this->model
            ->where('visi', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $rpjmdes, $limit);

        return $rpjmdes;
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
            $rpjmdes = $this->getNew();

            $rpjmdes->visi = e($data['visi']);
            $rpjmdes->user_id = e($data['user_id']);
            $rpjmdes->organisasi_id = e($data['organisasi_id']);

            $rpjmdes->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesRepository create action something wrong -' . $ex);
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
            $rpjmdes = $this->findById($id);

            $rpjmdes->visi = e($data['visi']);
            $rpjmdes->user_id = e($data['user_id']);
            $rpjmdes->organisasi_id = e($data['organisasi_id']);

            $rpjmdes->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesRepository update action something wrong -' . $ex);
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
            $rpjmdes = $this->findById($id);

            $rpjmdes->delete();

            // Return result success
            return $this->successDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}
