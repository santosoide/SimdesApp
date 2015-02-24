<?php namespace SimdesApp\Repositories\Kelompok;

use SimdesApp\Models\Kelompok;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Jenis\JenisRepository;
use SimdesApp\Services\LaraCacheInterface;

class KelompokRepository extends AbstractRepository {

    /**
     * @var JenisRepository
     */
    protected $jenis;

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * instance interface
     *
     * @param Kelompok $kelompok
     * @param JenisRepository $jenis
     * @param LaraCacheInterface $cache
     */
    public function __construct(Kelompok $kelompok, JenisRepository $jenis, LaraCacheInterface $cache)
    {
        $this->model = $kelompok;
        $this->jenis = $jenis;
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
        $key = 'kelompok-find-' . $page . $limit . $term;

        // Create Section
        $section = 'kelompok';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $organisasi = $this->model
            ->orderBy('kode_rekening', 'asc')
            ->where('kode_rekening', 'like', '%' . $term . '%')
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
     * @return mixed
     */
    public function create(array $data)
    {
        try {
            $kelompok = $this->getNew();

            $kelompok->kode_rekening = e($data['kode_rekening']);
            $kelompok->akun_id = $data['akun_id'];
            $kelompok->kelompok = e($data['kelompok']);

            $kelompok->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository create action something wrong -' . $ex);
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
            $kelompok = $this->findById($id);

            $kelompok->kode_rekening = e($data['kode_rekening']);
            $kelompok->akun_id = $data['akun_id'];
            $kelompok->kelompok = e($data['kelompok']);

            $kelompok->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository update action something wrong -' . $ex);
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
            $kelompok = $this->findById($id);

            if ($kelompok) {
                $result = $this->cekForDelete($kelompok->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }

                $kelompok->delete();
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get kelompok filter by id
     *
     * @param $id
     * @return mixed
     */
    public function getNamaKelompok($id)
    {
        $data = $this->findById($id);
        return $data->kelompok;
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

    /**
     * check jenis before delete
     *
     * @param $kelompok_id
     * @return mixed
     */
    public function cekForDelete($kelompok_id)
    {
        return $this->jenis->findIsExists($kelompok_id);
    }

    /**
     * @param $akun_id
     * @return mixed
     */
    public function findIsExists($akun_id)
    {
        return $this->model
            ->where('akun_id', '=', $akun_id)
            ->get();
    }

}
