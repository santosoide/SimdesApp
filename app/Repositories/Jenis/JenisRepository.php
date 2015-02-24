<?php
namespace SimdesApp\Repositories\Jenis;

use SimdesApp\Models\Jenis;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Obyek\ObyekRepository;
use SimdesApp\Services\LaraCacheInterface;

class JenisRepository extends AbstractRepository
{

    /**
     * @var ObyekRepository
     */
    protected $obyek;

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * instance interface
     *
     * @param Jenis $jenis
     * @param ObyekRepository $obyek
     * @param LaraCacheInterface $cache
     */
    public function __construct(Jenis $jenis, ObyekRepository $obyek, LaraCacheInterface $cache)
    {
        $this->model = $jenis;
        $this->obyek = $obyek;
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
        $key = 'jenis-find-' . $page . $limit . $term;

        // Create Section
        $section = 'jenis';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $jenis = $this->model
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $jenis, 10);

        return $jenis;
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
            $jenis = $this->getNew();

            $jenis->kode_rekening = e($data['kode_rekening']);
            $jenis->kelompok_id = $data['kelompok_id'];
            $jenis->jenis = e($data['jenis']);
            $jenis->status = e($data['status']);

            $jenis->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('JenisRepository create action something wrong -' . $ex);
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
            $jenis = $this->findById($id);

            $jenis->kode_rekening = e($data['kode_rekening']);
            $jenis->kelompok_id = $data['kelompok_id'];
            $jenis->jenis = e($data['jenis']);
            $jenis->status = e($data['status']);

            $jenis->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('JenisRepository update action something wrong -' . $ex);
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
            $jenis = $this->findById($id);

            if ($jenis){
                $jenis->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();


        } catch (\Exception $ex) {
            \Log::error('JenisRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get jenis filter by id
     *
     * @param $id
     * @return mixed
     */
    public function getNamaJenis($id)
    {
        $data = $this->findById($id);
        return $data->jenis;
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