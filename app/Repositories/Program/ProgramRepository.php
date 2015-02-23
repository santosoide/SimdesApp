<?php namespace SimdesApp\Repositories\Program;

use SimdesApp\Models\Program;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class ProgramRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    public function __construct(Program $program, LaraCacheInterface $cache)
    {
        $this->model = $program;
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
        $key = 'find-kewenangan-' . $page . $limit . $term;

        // Create Section
        $section = 'kewenangan';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $program = $this->model
            ->where('kode_rekening', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $program, 10);

        return $program;
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
            $program = $this->getNew();

            $program->kode_rekening = e($data['kode_rekening']);
            $program->bidang_id = $data['bidang_id'];
            $program->program = e($data['program']);
            $program->organisasi_id = e($data['organisasi_id']);

            $program->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('ProgramRepository create action something wrong -' . $ex);
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
            $program = $this->findById($id);

            $program->kode_rekening = e($data['kode_rekening']);
            $program->bidang_id = $data['bidang_id'];
            $program->program = e($data['program']);
            $program->organisasi_id = e($data['organisasi_id']);

            $program->save();

            // Return result success
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('ProgramRepository update action something wrong -' . $ex);
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
            $program = $this->findById($id);

            if ($program){
                $program->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('ProgramRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * @param $bidang_id
     * @return mixed
     */
    public function findIsExists($bidang_id)
    {
        return $this->model
            ->where('bidang_id', '=', $bidang_id)
            ->get();
    }


}
