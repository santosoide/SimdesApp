<?php namespace SimdesApp\Repositories\Program;

use SimdesApp\Models\Program;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Kegiatan\KegiatanRepository;
use SimdesApp\Services\LaraCacheInterface;

class ProgramRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @var KegiatanRepository
     */
    protected $kegiatan;

    /**
     * @param Program $program
     * @param LaraCacheInterface $cache
     * @param KegiatanRepository $kegiatan
     */
    public function __construct(Program $program, LaraCacheInterface $cache, KegiatanRepository $kegiatan)
    {
        $this->model = $program;
        $this->cache = $cache;
        $this->kegiatan = $kegiatan;
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
        $key = 'kewenangan-program-find-' . $page . $limit . $term;

        // Create Section
        $section = 'kewenangan-program';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $program = $this->model
            ->orderBy('kode_rekening', 'asc')
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

            // jika organisasi_id null Kewenangan Program diinput oleh Kabupaten
            $organisasi_id = (empty($data['organisasi_id'])) ? '' : $data['organisasi_id'];

            $program->kode_rekening = e($data['kode_rekening']);
            $program->bidang_id = e($data['bidang_id']);
            $program->program = e($data['program']);
            $program->organisasi_id = $organisasi_id;

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
            $program->bidang_id = e($data['bidang_id']);
            $program->program = e($data['program']);

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

            if ($program) {
                $result = $this->cekForDelete($program->_id);
                if (count($result) > 0) {
                    return $this->relationDeleteResponse();
                }

                $program->delete();
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

    /**
     * check kegiatan before delete
     *
     * @param $program_id
     * @return mixed
     */
    public function cekForDelete($program_id)
    {
        return $this->kegiatan->findIsExists($program_id);
    }

    /**
     * Get the list of Kegiatan using by Ajax Dropdown
     *
     * @param $bidang_id
     *
     * @return mixed
     */
    public function getListByBidang($bidang_id)
    {
        // set key
        $key = 'kewenangan-program-list' . $bidang_id;

        // set section
        $section = 'kewenangan-program';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $program = $this->model
            ->where('bidang_id', '=', $bidang_id)
            ->get(['_id', 'kode_rekening', 'program', 'bidang_id'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $program, 3600);

        return $program;
    }

    /**
     * Get the list of Kegiatan using by Ajax Dropdown
     *
     * @param $bidang_id
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListByBidangOrganisasi($bidang_id, $organisasi_id)
    {
        // set key
        $key = 'kewenangan-program-list-desa' . $bidang_id . $organisasi_id;

        // set section
        $section = 'kewenangan-program';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $program = $this->model
            ->where('bidang_id', '=', $bidang_id)
            ->where('organisasi_id', $organisasi_id)
            ->orWhere('organisasi_id', null)
            ->get(['_id', 'kode_rekening', 'program', 'bidang_id'])
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $program, 3600);

        return $program;
    }

    /**
     * Get the dashboard of Jumlah Program using by Ajax Dropdown
     *
     * @return mixed
     */
    public function getJumlahProgram()
    {
        // set key
        $key = 'rpjmdes-program-get-jumlah-program';

        // set section
        $section = 'rpjmdes-program';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $rpjmdesProgram = $this->model
            //->where('is_finish', '=', 1)
            ->count();

        // store to cache
        $this->cache->put($section, $key, $rpjmdesProgram, 10);

        return $rpjmdesProgram;
    }

}
