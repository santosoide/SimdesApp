<?php
namespace SimdesApp\Repositories\Organisasi;

use SimdesApp\Models\Organisasi;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Contracts\OrganisasiInterface;
use SimdesApp\Repositories\User\UserRepository;
use SimdesApp\Services\LaraCacheInterface;

class OrganisasiRepository extends AbstractRepository implements OrganisasiInterface
{

    /**
     * User Model
     *
     * @var User
     */
    protected $user;

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Organisasi $organisasi
     * @param UserRepository $user
     * @param LaraCacheInterface $cache
     */
    public function __construct(Organisasi $organisasi, UserRepository $user,  LaraCacheInterface $cache)
    {
        $this->model = $organisasi;
        $this->user = $user;
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
        $key = 'organisasi-find-' . $page . $limit . $term;

        // Create Section
        $section = 'organisasi';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $organisasi = $this->model
            ->orderBy('kode_kec', 'asc')
            ->where('nama', 'like', '%' . $term . '%')
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
            $organisasi = $this->getNew();

            $organisasi->nama = e($data['nama']);
            $organisasi->alamat = e($data['alamat']);
            $organisasi->no_telp = e($data['no_telp']);
            $organisasi->no_fax = e($data['no_fax']);
            $organisasi->email = e($data['email']);
            $organisasi->website = e($data['website']);
            $organisasi->desa = e($data['desa']);
            $organisasi->kode_desa = $data['kode_desa'];
            $organisasi->kec_id = $data['kec_id'];
            $organisasi->kec = e($data['kec']);
            $organisasi->kode_kec = $data['kode_kec'];
            $organisasi->kab = e($data['kab']);
            $organisasi->kode_kab = $data['kode_kab'];
            $organisasi->prov = e($data['prov']);
            $organisasi->kode_prov = $data['kode_prov'];
            $organisasi->is_active = $data['is_active'];

            $organisasi->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('OrganisasiRepository create action something wrong -' . $ex);
            return $this->errorInsertResponse();
        }
    }

    /**
     * Find data specific using parameter _id
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * Update data
     *
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data)
    {
        try {
            $organisasi = $this->findById($id);

            $organisasi->nama = e($data['nama']);
            $organisasi->alamat = e($data['alamat']);
            $organisasi->no_telp = e($data['no_telp']);
            $organisasi->no_fax = e($data['no_fax']);
            $organisasi->email = e($data['email']);
            $organisasi->website = e($data['website']);
            $organisasi->desa = e($data['desa']);
            $organisasi->kode_desa = $data['kode_desa'];
            $organisasi->kec_id = $data['kec_id'];
            $organisasi->kec = e($data['kec']);
            $organisasi->kode_kec = $data['kode_kec'];
            $organisasi->kab = e($data['kab']);
            $organisasi->kode_kab = $data['kode_kab'];
            $organisasi->prov = e($data['prov']);
            $organisasi->kode_prov = $data['kode_prov'];
            $organisasi->is_active = $data['is_active'];

            $organisasi->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('OrganisasiRepository update action something wrong -' . $ex);
            return $this->errorUpdateResponse();
        }
    }

    /**
     * Delete data
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        try {
            $organisasi = $this->findById($id);

            if ($organisasi) {
                $result = $this->cekForDelete($organisasi->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }

                $organisasi->delete();

                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('OrganisasiRepository create action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * check data user before delete
     *
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function cekForDelete($organisasi_id)
    {
        return $this->user->findIsExists($organisasi_id);
    }

    /**
     * Get kode desa
     *
     * @param $id
     * @return mixed
     */
    public function getKodeDesa($id)
    {
        $data = $this->findById($id);
        return $data->kode_desa;
    }

    /**
     * Get by kecamatan
     *
     * @param $kec_id
     * @return mixed
     */
    public function getByKecamatan($kec_id)
    {
        return $this->model
            ->where('kec_id', '=', $kec_id)
            ->get();
    }

    /**
     * Get the list of Organisasi using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getList()
    {
        // set key
        $key = 'organisasi-list';

        // set section
        $section = 'organisasi';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $organisasi = $this->model
            ->get(['_id', 'desa'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $organisasi, 3600);

        return $organisasi;
    }

    /**
     * Get list Organisasi on Trash
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getTrashed()
    {
        return $this->model->onlyTrashed()->get();
    }

    /**
     * Restore Organisasi Trashed
     *
     * @return mixed
     */
    public function getRestore()
    {
        $this->model->withTrashed()->restore();

        return $this->successResponseOk([
            'success' => true,
            'message' => 'Sukses : Data berhasil direstore'
        ]);
    }
}