<?php namespace SimdesApp\Repositories\Kecamatan;

use SimdesApp\Models\Kecamatan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Organisasi\OrganisasiRepository;
use SimdesApp\Services\LaraCacheInterface;

class KecamatanRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @var OrganisasiRepository
     */
    protected $organisasi;

    /**
     * instance interface
     *
     * @param Kecamatan $kecamatan
     * @param LaraCacheInterface $cache
     * @param OrganisasiRepository $organisasi
     */
    public function __construct(Kecamatan $kecamatan, LaraCacheInterface $cache, OrganisasiRepository $organisasi)
    {
        $this->model = $kecamatan;
        $this->cache = $cache;
        $this->organisasi = $organisasi;
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
        $key = 'kecamatan-find' . $page . $limit . $term;

        // set section
        $section = 'kecamatan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $kecamatan = $this->model
            ->where('kec', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $kecamatan, 10);

        return $kecamatan;
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
            $kecamatan = $this->getNew();

            $kecamatan->kode_kec = e($data['kode_kec']);
            $kecamatan->kec = e($data['kec']);

            $kecamatan->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('KecamatanRepository create action something wrong -' . $ex);
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
            $kecamatan = $this->findById($id);

            $kecamatan->kode_kec = e($data['kode_kec']);
            $kecamatan->kec = e($data['kec']);
            $kecamatan->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('KecamatanRepository update action something wrong -' . $ex);
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
            $kecamatan = $this->findById($id);

            if ($kecamatan) {
                $result = $this->checkOrganisasiBeforeDelete($kecamatan->_id);
                if (count($result) > 0) {
                    return $this->successResponseOk([
                        'success' => false,
                        'message' => [
                            'msg' => 'Data tidak boleh dihapus, karena data sudah terelasi.',
                        ],
                    ]);
                }

                $kecamatan->delete();
                return $this->successDeleteResponse();
            }

            return $this->successResponseOk([
                'success' => false,
                'message' => [
                    'msg' => 'Record sudah tidak ada atau sudah dihapus.',
                ],
            ]);
        } catch (\Exception $ex) {
            \Log::error('KecamatanRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * Check organisasi before delete
     *
     * @param $kec_id
     * @return mixed
     */
    public function checkOrganisasiBeforeDelete($kec_id)
    {
        return $this->organisasi->getByKecamatan($kec_id);
    }
}
