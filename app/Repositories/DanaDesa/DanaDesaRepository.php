<?php namespace SimdesApp\Repositories\DanaDesa;

use SimdesApp\Models\DanaDesa;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class DanaDesaRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

	/**
     * @param LaraCacheInterface $cache
     */
    public function __construct(DanaDesa $danaDesa, LaraCacheInterface $cache)
    {
        $this->model = $danaDesa;
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
        // set key
        $key = 'dana-desa-find-' . $page . $limit . $term;

        // set section
        $section = 'dana-desa';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $danaDesa = $this->model
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $danaDesa, 10);

        return $danaDesa;
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
            $danaDesa = $this->getNew();

            $danaDesa->sumber_dana_id = e($data['sumber_dana_id']);
            $danaDesa->jumlah = e($data['jumlah']);
            $danaDesa->sisa_anggaran = e($data['jumlah']);

            $danaDesa->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('DanaDesaRepository create action something wrong -' . $ex);
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
            $danaDesa =  $this->findById($id);

            if ($danaDesa->whois_posting == 1) {
                return $this->successResponseOk([
                    'success' => false,
                    'message' => [
                        'msg' => 'Data yang diinput oleh Administrator Desa tidak boleh diedit.',
                    ],
                ]);
            }

            $danaDesa->sumber_dana_id = e($data['sumber_dana_id']);
            $danaDesa->jumlah = e($data['jumlah']);

            $danaDesa->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('DanaDesaRepository update action something wrong -' . $ex);
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
            $danaDesa = $this->findById($id);

            if ($danaDesa) {
                if ($danaDesa->whois_posting == 1) {
                    return $this->successResponseOk([
                        'success' => false,
                        'message' => [
                            'msg' => 'Data yang diinput oleh Administrator Desa tidak boleh dihapus.',
                        ],
                    ]);
                }

                $danaDesa->delete();
                return $this->successDeleteResponse();
            }

            return $this->successResponseOk([
                'success' => false,
                'message' => [
                    'msg' => 'Record sudah tidak ada atau sudah dihapus.',
                ],
            ]);
        } catch (\Exception $ex) {
            \Log::error('DanaDesaRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Get the list of Dana Desa using by Ajax Dropdown
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListByOrganisasi($organisasi_id)
    {
        // set key
        $key = 'dana-desa-tersedia' . $organisasi_id;

        // set section
        $section = 'dana-desa';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $danaDesa = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->paginate(10)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $danaDesa, 10);

        return $danaDesa;
    }

}
