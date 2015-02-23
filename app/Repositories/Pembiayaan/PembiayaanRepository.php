<?php namespace SimdesApp\Repositories\Pembiayaan;

use SimdesApp\Models\Pembiayaan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Services\LaraCacheInterface;

class PembiayaanRepository extends AbstractRepository {

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @param Pembiayaan $pembiayaan
     * @param LaraCacheInterface $cache
     */
    public function __construct(Pembiayaan $pembiayaan, LaraCacheInterface $cache)
    {
        $this->model = $pembiayaan;
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
        // set key
        $key = 'pembiayaan-find' . $page . $limit . $term . $organisasi_id;

        // set section
        $section = 'pembiayaan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pembiayaan = $this->model
            ->where('pembiayaan', 'like', '%' . $term . '%')
            ->where('organisasi_id', '=', $organisasi_id)
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $pembiayaan, 10);

        return $pembiayaan;
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
            $pembiayaan = $this->getNew();

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

            //$pembiayaan->pembiayaan = $this->getNamaPembiayaan($kelompok_id, $jenis_id, $obyek_id);
            //$pembiayaan->kode_rekening = $this->getKodeRekening($kelompok_id, $jenis_id, $obyek_id);
            $pembiayaan->tahun = e($data['tahun']);
            $pembiayaan->kelompok_id = $kelompok_id;
            $pembiayaan->jenis_id = $jenis_id;
            $pembiayaan->obyek_id = $obyek_id;
            $pembiayaan->satuan1 = $satuan1;
            $pembiayaan->satuan2 = $satuan2;
            $pembiayaan->satuan3 = $satuan3;
            $pembiayaan->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $pembiayaan->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $pembiayaan->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $pembiayaan->jumlah = $jumlah;
            $pembiayaan->satuan_harga = $data['satuan_harga'];

            $pembiayaan->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('PembiayaanRepository create action something wrong -' . $ex);
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
            $pembiayaan = $this->findById($id);

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

            //$pembiayaan->pembiayaan = $this->getNamaPembiayaan($kelompok_id, $jenis_id, $obyek_id);
            //$pembiayaan->kode_rekening = $this->getKodeRekening($kelompok_id, $jenis_id, $obyek_id);
            $pembiayaan->tahun = e($data['tahun']);
            $pembiayaan->kelompok_id = $kelompok_id;
            $pembiayaan->jenis_id = $jenis_id;
            $pembiayaan->obyek_id = $obyek_id;
            $pembiayaan->satuan1 = $satuan1;
            $pembiayaan->satuan2 = $satuan2;
            $pembiayaan->satuan3 = $satuan3;
            $pembiayaan->volume1 = (empty($data['volume1'])) ? '' : $data['volume1'];
            $pembiayaan->volume2 = (empty($data['volume2'])) ? '' : $data['volume2'];
            $pembiayaan->volume3 = (empty($data['volume3'])) ? '' : $data['volume3'];
            $pembiayaan->jumlah = $jumlah;
            $pembiayaan->satuan_harga = $data['satuan_harga'];

            $pembiayaan->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('PembiayaanRepository update action something wrong -' . $ex);
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
            $pembiayaan = $this->findById($id);

            if ($pembiayaan){
                $pembiayaan->delete();

                // Return result success
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('PembiayaanRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

}
