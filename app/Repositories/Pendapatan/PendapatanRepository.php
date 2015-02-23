<?php namespace SimdesApp\Repositories\Pendapatan;

use SimdesApp\Models\Pendapatan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class PendapatanRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param LaraCacheInterface $cache
     */
    public function __construct(Pendapatan $pendapatan, LaraCacheInterface $cache)
    {
        $this->model = $pendapatan;
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
    public function find($page = 1, $limit = 10, $term = null, $organisasi_id)
    {
        // Create Key for cache
        $key = 'find-pendapatan' . $page . $limit . $term;

        // Create Section
        $section = 'pendapatan';

        // If cache is exist get data from cache
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // Search data
        $pendapatan = $this->model
            ->where('pendapatan', 'like', '%' . $term . '%')
            ->where('organisasi_id', '=', $organisasi_id)
            ->paginate($limit)
            ->toArray();

        // Create cache
        $this->cache->put($section, $key, $pendapatan, $limit);

        return $pendapatan;
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
            $pendapatan = $this->getNew();

            $kelompok_id = (empty($data['kelompok_id'])) ? '0' : $data['kelompok_id'];
            $jenis_id = (empty($data['jenis_id'])) ? '0' : $data['jenis_id'];
            $obyek_id = (empty($data['obyek_id'])) ? '0' : $data['obyek_id'];

            $satuan1 = (empty($data['satuan1'])) ? '' : $data['satuan1'];
            $satuan2 = (empty($data['satuan2'])) ? '' : $data['satuan2'];
            $satuan3 = (empty($data['satuan3'])) ? '' : $data['satuan3'];
            $volume1 = (empty($data['volume1'])) ? '1' : $data['volume1'];
            $volume2 = (empty($data['volume2'])) ? '1' : $data['volume2'];
            $volume3 = (empty($data['volume3'])) ? '1' : $data['volume3'];
            $satuan_harga = (empty($data['satuan_harga'])) ? '1' : $data['satuan_harga'];
            $jumlah = $volume1 * $volume2 * $volume3 * $satuan_harga;

            //$pendapatan->pendapatan = $this->getNamaPendapatan($kelompok_id, $jenis_id, $obyek_id);
            //$pendapatan->kode_rekening = $this->getKodeRekening($kelompok_id, $jenis_id, $obyek_id);
            $pendapatan->tahun = e($data['tahun']);
            $pendapatan->kelompok_id = $kelompok_id;
            $pendapatan->jenis_id = $jenis_id;
            $pendapatan->obyek_id = $obyek_id;
            $pendapatan->satuan1 = $satuan1;
            $pendapatan->satuan2 = $satuan2;
            $pendapatan->satuan3 = $satuan3;
            $pendapatan->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $pendapatan->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $pendapatan->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $pendapatan->jumlah = $jumlah;
            $pendapatan->satuan_harga = $data['satuan_harga'];

            $pendapatan->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('PendapatanRepository create action something wrong -' . $ex);
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
            $pendapatan = $this->findById($id);

            $kelompok_id = (empty($data['kelompok_id'])) ? '0' : $data['kelompok_id'];
            $jenis_id = (empty($data['jenis_id'])) ? '0' : $data['jenis_id'];
            $obyek_id = (empty($data['obyek_id'])) ? '0' : $data['obyek_id'];

            $satuan1 = (empty($data['satuan1'])) ? '' : $data['satuan1'];
            $satuan2 = (empty($data['satuan2'])) ? '' : $data['satuan2'];
            $satuan3 = (empty($data['satuan3'])) ? '' : $data['satuan3'];
            $volume1 = (empty($data['volume1'])) ? '1' : $data['volume1'];
            $volume2 = (empty($data['volume2'])) ? '1' : $data['volume2'];
            $volume3 = (empty($data['volume3'])) ? '1' : $data['volume3'];
            $satuan_harga = (empty($data['satuan_harga'])) ? '1' : $data['satuan_harga'];
            $jumlah = $volume1 * $volume2 * $volume3 * $satuan_harga;

            //$pendapatan->pendapatan = $this->getNamaPendapatan($kelompok_id, $jenis_id, $obyek_id);
            //$pendapatan->kode_rekening = $this->getKodeRekening($kelompok_id, $jenis_id, $obyek_id);
            $pendapatan->tahun = e($data['tahun']);
            $pendapatan->kelompok_id = $kelompok_id;
            $pendapatan->jenis_id = $jenis_id;
            $pendapatan->obyek_id = $obyek_id;
            $pendapatan->satuan1 = $satuan1;
            $pendapatan->satuan2 = $satuan2;
            $pendapatan->satuan3 = $satuan3;
            $pendapatan->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $pendapatan->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $pendapatan->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $pendapatan->jumlah = $jumlah;
            $pendapatan->satuan_harga = $data['satuan_harga'];

            $pendapatan->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('PendapatanRepository update action something wrong -' . $ex);
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
            $pendapatan = $this->findById($id);

            if ($pendapatan){
                $pendapatan->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('PendapatanRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

//    /**
//     * Get name pendapatan from kelompok, jenis, obyek
//     *
//     * @param $kelompok_id
//     * @param $jenis_id
//     * @param $obyek_id
//     * @return mixed
//     */
//    public function getNamaPendapatan($kelompok_id, $jenis_id, $obyek_id)
//    {
//        if (!empty($obyek_id)) {
//            return $this->obyek->getNamaObyek($obyek_id);
//        } elseif (!empty($jenis_id)) {
//            return $this->jenis->getKodeRekening($jenis_id);
//        } elseif (!empty($kelompok_id)) {
//            return $this->kelompok->getNamaKelompok($kelompok_id);
//        }
//    }
//
//    /**
//     * Get kode rekening from kelompok, jenis, obyek
//     *
//     * @param $kelompok_id
//     * @param $jenis_id
//     * @param $obyek_id
//     * @return mixed
//     */
//    public function getKodeRekening($kelompok_id, $jenis_id, $obyek_id)
//    {
//        if (!empty($obyek_id)) {
//            return $this->obyek->getKodeRekening($obyek_id);
//        } elseif (!empty($jenis_id)) {
//            return $this->jenis->getKodeRekening($jenis_id);
//        } elseif (!empty($kelompok_id)) {
//            return $this->kelompok->getKodeRekening($kelompok_id);
//        }
//    }
}
