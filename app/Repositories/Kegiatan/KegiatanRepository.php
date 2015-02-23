<?php namespace SimdesApp\Repositories\Kegiatan;

use SimdesApp\Models\Kegiatan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class KegiatanRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    public function __construct(Kegiatan $kegiatan, LaraCacheInterface $cache)
    {
        $this->model = $kegiatan;
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
        $key = 'find-kegiatan-' . $page . $limit . $term;

        // Create Section
        $section = 'kegiatan';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $kegiatan = $this->model
            ->orderBy('kode_rekening', 'asc')
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $kegiatan, 10);

        return $kegiatan;
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
            $kegiatan = $this->getNew();

            // jika organisasi_id null Kewenangan Kegiatan diinput oleh Kabupaten
            $organisasi_id = (empty($data['organisasi_id'])) ? '' : $data['organisasi_id'];

            $kegiatan->kode_rekening = e($data['kode_rekening']);
            $kegiatan->program_id = e($data['program_id']);
            $kegiatan->kegiatan = e($data['kegiatan']);
            $kegiatan->organisasi_id = $organisasi_id;

            $kegiatan->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('KegiatanRepository create action something wrong -' . $ex);
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
            $kegiatan = $this->findById($id);

            $kegiatan->kode_rekening = e($data['kode_rekening']);
            $kegiatan->program_id = e($data['program_id']);
            $kegiatan->kegiatan = e($data['kegiatan']);

            $kegiatan->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('KegiatanRepository update action something wrong -' . $ex);
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
            $kegiatan = $this->findById($id);

            if ($kegiatan){
                $kegiatan->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('KegiatanRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}
