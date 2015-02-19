<?php namespace SimdesApp\Repositories\Obyek;

use SimdesApp\Models\Obyek;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class ObyekRepository extends AbstractRepository {

    protected $cache;

    public function __construct(Obyek $obyek, LaraCacheInterface $cache)
    {
        $this->model = $obyek;
        $this->cache = $cache;
    }

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

    public function findById($id)
    {
        return $this->model->find($id);
    }

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

    public function destroy($id)
    {
        try {
            $obyek = $this->findById($id);

            $obyek->delete();

            /*Return result success*/
            return $this->successDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('ObyekRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}
