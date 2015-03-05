<?php namespace SimdesApp\Repositories\LokasiProgram;

use SimdesApp\Models\LokasiProgram;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class LokasiProgramRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param LokasiProgram $lokasiProgram
     * @param LaraCacheInterface $cache
     */
    public function __construct(LokasiProgram $lokasiProgram, LaraCacheInterface $cache)
    {
        $this->model = $lokasiProgram;
        $this->cache = $cache;
    }

    /**
     * @param int $page
     * @param int $limit
     * @param null $term
     * @param $organisasi_id
     * @param $rpjmdes_program_id
     * @return mixed
     */
    public function find($page = 1, $limit = 10, $term = null, $organisasi_id, $rpjmdes_program_id)
    {
        // set key
        $key = 'lokasi-program-find-' . $page . $limit . $term . $organisasi_id . $rpjmdes_program_id;

        // set section
        $section = 'lokasi-program';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $lokasiProgram = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->where('rpjmdes_program_id', '=', $rpjmdes_program_id)
            ->where('lokasi', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $lokasiProgram, 10);

        return $lokasiProgram;
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
            $lokasiProgram = $this->getNew();

            $satuan1 = (empty($data['satuan1'])) ? '' : $data['satuan1'];
            $satuan2 = (empty($data['satuan2'])) ? '' : $data['satuan2'];
            $satuan3 = (empty($data['satuan3'])) ? '' : $data['satuan3'];
            $volume1 = (empty($data['volume1'])) ? '1' : $data['volume1'];
            $volume2 = (empty($data['volume2'])) ? '1' : $data['volume2'];
            $volume3 = (empty($data['volume3'])) ? '1' : $data['volume3'];
            $harga_satuan = (empty($data['harga_satuan'])) ? '1' : $data['harga_satuan'];
            $anggaran = $volume1 * $volume2 * $volume3 * $harga_satuan;

            $lokasiProgram->rpjmdes_program_id = e($data['rpjmdes_program_id']);
            $lokasiProgram->pejabat_desa_id = e($data['pejabat_desa_id']);
            $lokasiProgram->lokasi = e($data['lokasi']);
            $lokasiProgram->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $lokasiProgram->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $lokasiProgram->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $lokasiProgram->satuan1 = $satuan1;
            $lokasiProgram->satuan2 = $satuan2;
            $lokasiProgram->satuan3 = $satuan3;
            $lokasiProgram->sasaran_manfaat_laki = e($data['sasaran_manfaat_laki']);
            $lokasiProgram->sasaran_manfaat_wanita = e($data['sasaran_manfaat_wanita']);
            $lokasiProgram->sasaran_manfaat_artm = e($data['sasaran_manfaat_artm']);
            $lokasiProgram->sasaran_satuan = e($data['sasaran_satuan']);
            $lokasiProgram->harga_satuan = $harga_satuan;
            $lokasiProgram->anggaran = $anggaran;
            $lokasiProgram->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('LokasiProgramRepository create action something wrong -' . $ex);
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
            $lokasiProgram = $this->findById($id);

            $satuan1 = (empty($data['satuan1'])) ? '' : $data['satuan1'];
            $satuan2 = (empty($data['satuan2'])) ? '' : $data['satuan2'];
            $satuan3 = (empty($data['satuan3'])) ? '' : $data['satuan3'];
            $volume1 = (empty($data['volume1'])) ? '1' : $data['volume1'];
            $volume2 = (empty($data['volume2'])) ? '1' : $data['volume2'];
            $volume3 = (empty($data['volume3'])) ? '1' : $data['volume3'];
            $harga_satuan = (empty($data['harga_satuan'])) ? '1' : $data['harga_satuan'];
            $anggaran = $volume1 * $volume2 * $volume3 * $harga_satuan;

            $lokasiProgram->rpjmdes_program_id = e($data['rpjmdes_program_id']);
            $lokasiProgram->pejabat_desa_id = e($data['pejabat_desa_id']);
            $lokasiProgram->lokasi = e($data['lokasi']);
            $lokasiProgram->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $lokasiProgram->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $lokasiProgram->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $lokasiProgram->satuan1 = $satuan1;
            $lokasiProgram->satuan2 = $satuan2;
            $lokasiProgram->satuan3 = $satuan3;
            $lokasiProgram->sasaran_manfaat_laki = e($data['sasaran_manfaat_laki']);
            $lokasiProgram->sasaran_manfaat_wanita = e($data['sasaran_manfaat_wanita']);
            $lokasiProgram->sasaran_manfaat_artm = e($data['sasaran_manfaat_artm']);
            $lokasiProgram->sasaran_satuan = e($data['sasaran_satuan']);
            $lokasiProgram->harga_satuan = $harga_satuan;
            $lokasiProgram->anggaran = $anggaran;
            $lokasiProgram->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('LokasiProgramRepository update action something wrong -' . $ex);
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
            $lokasiProgram = $this->findById($id);

            if ($lokasiProgram) {
                $lokasiProgram->delete();

                return $this->successDeleteResponse();
            }

            return $this->successResponseOk([
                'success' => false,
                'message' => [
                    'msg' => 'Record sudah tidak ada atau sudah dihapus.',
                ],
            ]);
        } catch (\Exception $ex) {
            \Log::error('LokasiProgramRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

}
