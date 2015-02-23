<?php namespace SimdesApp\Repositories\Obyek;

use SimdesApp\Models\Obyek;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class ObyekRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Obyek $obyek
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
     * @param int $page
     * @param int $limit
     * @param null $term
     * @return mixed
     */
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
        $obyek = $this->model
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $obyek, $limit);

        return $obyek;
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
            $obyek = $this->getNew();

            $obyek->kode_rekening = e($data['kode_rekening']);
            $obyek->jenis_id = $data['jenis_id'];
            $obyek->obyek = e($data['obyek']);
            $obyek->organisasi_id = e($data['organisasi_id']);

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
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update the Record
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $obyek = $this->findById($id);

            $obyek->kode_rekening = e($data['kode_rekening']);
            $obyek->jenis_id = $data['jenis_id'];
            $obyek->obyek = e($data['obyek']);
            $obyek->organisasi_id = e($data['organisasi_id']);

            $obyek->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('ObyekRepository update action something wrong -' . $ex);
            return $this->errorUpdateResponse();
        }
    }

    /**
     * Destroy the Record
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $obyek = $this->findById($id);

            if ($obyek){
                $obyek->delete();

                // Return result success
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
     * @return mixed
     */
    public function getKodeRekening($id)
    {
        $data = $this->findById($id);
        return $data->kode_rekening;
    }
}
