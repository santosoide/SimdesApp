<?php namespace SimdesApp\Repositories\RPJMDES_Misi;

use SimdesApp\Models\RpjmdesMisi;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class RpjmdesMisiRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    public function __construct(RpjmdesMisi $rpjmdesMisi, LaraCacheInterface $cache)
    {
        $this->model = $rpjmdesMisi;
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
        $key = 'find-rpjmdes_misi-' . $page . $limit . $term;

        // Create Section
        $section = 'rpjmdes_misi';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $rpjmdesMisi = $this->model
            ->where('misi', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $rpjmdesMisi, 10);

        return $rpjmdesMisi;
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
            $rpjmdesMisi = $this->getNew();

            $rpjmdesMisi->rpjmdes_id = e($data['rpjmdes_id']);
            $rpjmdesMisi->misi = e($data['misi']);
            $rpjmdesMisi->user_id = e($data['user_id']);
            $rpjmdesMisi->organisasi_id = e($data['organisasi_id']);

            $rpjmdesMisi->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesMisiRepository create action something wrong -' . $ex);
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
            $rpjmdesMisi = $this->findById($id);

            $rpjmdesMisi->rpjmdes_id = e($data['rpjmdes_id']);
            $rpjmdesMisi->misi = e($data['misi']);
            $rpjmdesMisi->user_id = e($data['user_id']);
            $rpjmdesMisi->organisasi_id = e($data['organisasi_id']);

            $rpjmdesMisi->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesMisiRepository update action something wrong -' . $ex);
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
            $rpjmdesMisi = $this->findById($id);

            if ($rpjmdesMisi){
                $rpjmdesMisi->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesMisiRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

}
