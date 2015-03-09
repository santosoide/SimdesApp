<?php namespace SimdesApp\Repositories\Transaksi_Pendapatan;

use SimdesApp\Models\TransaksiPendapatan;
use SimdesApp\Repositories\AbstractRepository;
use SimdesApp\Repositories\Organisasi\OrganisasiRepository;
use SimdesApp\Services\LaraCacheInterface;

class TransaksiPendapatanRepository extends AbstractRepository
{

    /**
     * @var LaraCacheInterface
     */
    protected $cache;

    /**
     * @var OrganisasiRepository
     */
    protected $organisasi;


    /**
     * @param TransaksiPendapatan $transaksiPendapatan
     * @param LaraCacheInterface $cache
     * @param OrganisasiRepository $organisasi
     */
    public function __construct(TransaksiPendapatan $transaksiPendapatan, LaraCacheInterface $cache, OrganisasiRepository $organisasi)
    {
        $this->model = $transaksiPendapatan;
        $this->cache = $cache;
        $this->organisasi = $organisasi;
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
        // set key
        $key = 'transaksi-pendapatan-find-' . $page . $limit . $term;

        // set section
        $section = 'transaksi-pendapatan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pendapatan = $this->model
            ->where('pendapatan', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $pendapatan, 10);

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

            $kode_desa = $this->organisasi->getKodeDesa($data['organisasi_id']);
            $kode_rekening = e($data['kode_rekening']);
            $no_bukti = e($data['nomor_bukti']);
            $nomor_bukti = $no_bukti . '/STS-' . $kode_rekening . '/' . $kode_desa . '/' . date('Y');
            $nomor_bku_sts = $no_bukti . '/BKT.STS-' . $kode_rekening . '/' . $kode_desa . '/' . date('Y');

            $pendapatan->pendapatan_id = e($data['pendapatan_id']);
            $pendapatan->pendapatan = e($data['pendapatan']);
            $pendapatan->tanggal = e($data['tanggal']);
            $pendapatan->nomor_bukti = $no_bukti;
            $pendapatan->nomor_bku = $nomor_bukti;
            $pendapatan->nomor_bku_sts = $nomor_bku_sts;
            $pendapatan->jumlah = e($data['jumlah']);
            $pendapatan->pejabat_desa_id = e($data['pejabat_desa_id']);
            $pendapatan->penerima = e($data['penerima']);

            $pendapatan->save();

            /*Return result success*/
            return $this->successInsertResponse();

        } catch (\Exception $ex) {
            \Log::error('TransaksiPendapatanRepository create action something wrong -' . $ex);
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

            $kode_desa = $this->organisasi->getKodeDesa($data['organisasi_id']);
            $kode_rekening = e($data['kode_rekening']);
            $no_bukti = e($data['nomor_bukti']);
            $nomor_bukti = $no_bukti . '/STS-' . $kode_rekening . '/' . $kode_desa . '/' . date('Y');
            $nomor_bku_sts = $no_bukti . '/BKT.STS-' . $kode_rekening . '/' . $kode_desa . '/' . date('Y');

            $pendapatan->pendapatan_id = e($data['pendapatan_id']);
            $pendapatan->pendapatan = e($data['pendapatan']);
            $pendapatan->tanggal = e($data['tanggal']);
            $pendapatan->nomor_bukti = $no_bukti;
            $pendapatan->nomor_bku = $nomor_bukti;
            $pendapatan->nomor_bku_sts = $nomor_bku_sts;
            $pendapatan->jumlah = e($data['jumlah']);
            $pendapatan->pejabat_desa_id = e($data['pejabat_desa_id']);
            $pendapatan->penerima = e($data['penerima']);

            $pendapatan->save();

            /*Return result success*/
            return $this->successUpdateResponse();

        } catch (\Exception $ex) {
            \Log::error('TransaksiPendapatanRepository update action something wrong -' . $ex);
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

            if ($pendapatan) {
                $pendapatan->delete();
                return $this->successDeleteResponse();
            }

            return $this->emptyDeleteResponse();

        } catch (\Exception $ex) {
            \Log::error('TransaksiPendapatanRepository destroy action something wrong -' . $ex);
            return $this->errorDeleteResponse();
        }
    }

    /**
     * @param $organisasi_id
     *
     * @return mixed
     */
    public function getListPendapatanIsFinish($organisasi_id)
    {
        return \DB::table('pendapatan')
            ->where(function ($query) use ($organisasi_id) {
                $query->where('organisasi_id', '=', $organisasi_id)
                    ->where('is_finish', '=', 1)
                    ->whereNull('deleted_at');
            })
            ->orderBy('kode_rekening', 'asc')
            ->get(
                [
                    '_id',
                    'kode_rekening',
                    'pendapatan',
                ]);
    }

    /**
     * @param $organisasi_id
     * @return mixed
     */
    public function getCountByDesa($organisasi_id)
    {
        // set key
        $key = 'transaksi-pendapatan-get-count-by-desa' . $organisasi_id;

        // set section
        $section = 'transaksi-pendapatan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pendapatan = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->count();

        // store to cache
        $this->cache->put($section, $key, $pendapatan, 10);

        return $pendapatan;
    }

    /**
     * get pendapatan by organisasi id
     *
     * @param int $page
     * @param int $limit
     * @param null $term
     * @param      $organisasi_id
     * @return mixed
     */
    public function getTransaksiPendapatanByDesa($page = 1, $limit = 10, $term = null, $organisasi_id)
    {
        // set key
        $key = 'transaksi-pendapatan-get-desa' . $page . $limit . $term . $organisasi_id;

        // set section
        $section = 'transaksi-pendapatan';

        // has section and key
        if ($this->cache->has($section, $key)) {
            return $this->cache->get($section, $key);
        }

        // query to database
        $pendapatan = $this->model
            ->orderBy('created_at', 'desc')
            ->where('organisasi_id', '=', $organisasi_id)
            ->where('pendapatan', 'like', '%' . $term . '%')
            ->paginate($limit)
            ->toArray();

        // store to cache
        $this->cache->put($section, $key, $pendapatan, 10);

        return $pendapatan;
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param $organisasi_id
     * @param $tanggal_awal
     * @param $tanggal_akhir
     * @param $dana_desa_id
     * @return mixed
     */
    public function getChartByOrganisasiId($organisasi_id, $tanggal_awal, $tanggal_akhir, $dana_desa_id)
    {
        return $pendapatan = $this->model
            ->where('organisasi_id', '=', $organisasi_id)
            ->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])
            ->where('dana_desa_id', '=', $dana_desa_id)
            ->get('tanggal', 'jumlah')
            ->toArray();
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param $tanggal_awal
     * @param $tanggal_akhir
     * @param $dana_desa_id
     * @return mixed
     */
    public function getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id)
    {
        return $pendapatan = $this->model
            ->whereBetween('tanggal', [$tanggal_awal, $tanggal_akhir])
            ->where('dana_desa_id', '=', $dana_desa_id)
            ->get('tanggal', 'jumlah')
            ->toArray();
    }
}
