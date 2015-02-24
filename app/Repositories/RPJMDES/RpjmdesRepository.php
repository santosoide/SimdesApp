<?php namespace SimdesApp\Repositories\RPJMDES;

use SimdesApp\Models\Rpjmdes;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\RPJMDES_Misi\RpjmdesMisiRepository;
use SimdesApp\Services\LaraCacheInterface;

class RpjmdesRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    protected $misi;

    public function __construct(Rpjmdes $rpjmdes, LaraCacheInterface $cache, RpjmdesMisiRepository $misi)
    {
        $this->model = $rpjmdes;
        $this->cache = $cache;
        $this->misi = $misi;
    }

    /**
     * Instant find or search with paging, limit, and query
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null, $organisasi_id)
    {
        // Create Key for cache
        $key = 'rpjmdes-find-' . $page . $limit . $term . $organisasi_id;

        // Create Section
        $section = 'rpjmdes';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $rpjmdes = $this->model
            ->where('visi', 'like', '%' . $term . '%')
            ->where('organisasi_id', '=', $organisasi_id)
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $rpjmdes, 10);

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

            $rpjmdes->save();

            // Return result success
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

            if ($rpjmdes) {
                $result = $this->cekForDelete($rpjmdes->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }

                $rpjmdes->delete();
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * @param $rpjmdes_id
     *
     * @return mixed
     */
    public function cekForDelete($rpjmdes_id)
    {
        return $this->misi->findIsExists($rpjmdes_id);
    }
}
