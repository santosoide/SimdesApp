<?php
namespace SimdesApp\Repositories\Organisasi;


use SimdesApp\Models\Organisasi;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class OrganisasiRepository extends AbstractRepository
{
    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Organisasi $organisasi
     * @param LaraCacheInterface $cache
     */
    public function __construct(Organisasi $organisasi, LaraCacheInterface $cache)
    {
        $this->model = $organisasi;
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
        $key = 'find-organisasi-' . $page . $limit . $term;

        // Create Section
        $section = 'organisasi';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $organisasi = $this->model
            ->where('nama', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $organisasi, $limit);

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
            $organisasi->user_id = e($data['user_id']);
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
            $organisasi->user_id = e($data['user_id']);
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

            if ($organisasi){
                $organisasi->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('OrganisasiRepository create action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}