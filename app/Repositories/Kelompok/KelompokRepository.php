<?php namespace SimdesApp\Repositories\Kelompok;

use SimdesApp\Models\Kelompok;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class KelompokRepository extends AbstractRepository {

    protected $cache;

    public function __construct(Kelompok $kelompok, LaraCacheInterface $cache)
    {
        $this->model = $kelompok;
        $this->cache = $cache;
    }

    public function find($page = 1, $limit = 10, $term = null)
    {
        // Create Key for cache
        $key = 'find-kelompok-' . $page . $limit . $term;

        // Create Section
        $section = 'kelompok';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $organisasi = $this->model
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $organisasi, $limit);

        return $organisasi;
    }

    public function create(array $data)
    {
        try {
            $kelompok = $this->getNew();

            $kelompok->kode_rekening = e($data['kode_rekening']);
            $kelompok->akun_id = $data['akun_id'];
            $kelompok->kelompok = e($data['kelompok']);

            $kelompok->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository create action something wrong -' . $ex);
            return $this->errorInsertResponse();
        }
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function update($id, array $data)
    {
        try {
            $kelompok = $this->findById($id);

            $kelompok->kode_rekening = e($data['kode_rekening']);
            $kelompok->akun_id = $data['akun_id'];
            $kelompok->kelompok = e($data['kelompok']);

            $kelompok->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository update action something wrong -' . $ex);
            return $this->errorUpdateResponse();
        }
    }

    public function destroy($id)
    {
        try {
            $kelompok = $this->findById($id);

            $kelompok->delete();

            /*Return result success*/
            return $this->successDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('KelompokRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

}
