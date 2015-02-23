<?php namespace SimdesApp\Repositories\RPJMDES_Program;

use SimdesApp\Models\RpjmdesProgram;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class RpjmdesProgramRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    public function __construct(RpjmdesProgram $rpjmdesProgram ,LaraCacheInterface $cache)
    {
        $this->model = $rpjmdesProgram;
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
        $key = 'find-rpjmdes_program-' . $page . $limit . $term;

        // Create Section
        $section = 'rpjmdes_program';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $rpjmdesProgram = $this->model
            ->where('misi', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $rpjmdesProgram, $limit);

        return $rpjmdesProgram;
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
            $rpjmdesProgram = $this->getNew();

            $rpjmdesProgram->user_id = e($data['user_id']);
            $rpjmdesProgram->organisasi_id = e($data['organisasi_id']);
            $rpjmdesProgram->kegiatan_id = $data['kegiatan_id'];
            $rpjmdesProgram->pelaksanaan = $data['pelaksanaan'];
            $rpjmdesProgram->sumber_dana_id = $data['sumber_dana_id'];

            $rpjmdesProgram->save();

            // Return result success
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesProgramRepository create action something wrong -' . $ex);
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
            $rpjmdesProgram = $this->findById($id);

            $rpjmdesProgram->user_id = e($data['user_id']);
            $rpjmdesProgram->organisasi_id = e($data['organisasi_id']);
            $rpjmdesProgram->kegiatan_id = $data['kegiatan_id'];
            $rpjmdesProgram->pelaksanaan = $data['pelaksanaan'];
            $rpjmdesProgram->sumber_dana_id = $data['sumber_dana_id'];

            $rpjmdesProgram->save();


            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesProgramRepository update action something wrong -' . $ex);
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
            $rpjmdesProgram = $this->findById($id);

            if ($rpjmdesProgram){
                $rpjmdesProgram->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('RpjmdesProgramRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }
}
