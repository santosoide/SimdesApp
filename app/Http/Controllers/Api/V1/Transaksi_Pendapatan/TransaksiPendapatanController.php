<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Pendapatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanCreateForm;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanEditForm;
use SimdesApp\Repositories\Contracts\TransaksiPendapatanInterface;
use SimdesApp\Repositories\Transaksi_Pendapatan\TransaksiPendapatanRepository;

class TransaksiPendapatanController extends Controller
{
    /**
     * @var TransaksiPendapatanInterface
     */
    protected $transaksiPendapatan;

    /**
     * Create new AkunController Instance
     *
     * @param TransaksiPendapatanInterface $transaksiPendapatan
     */
    public function __construct(TransaksiPendapatanInterface $transaksiPendapatan)
    {
        $this->transaksiPendapatan = $transaksiPendapatan;
    }

    /**
     * Find transaksi pendapatan
     *
     * @return mixed
     */
    public function index()
    {
        return $this->transaksiPendapatan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi pendapatan
     *
     * @param TransaksiPendapatanCreateForm $request
     * @return mixed
     */
    public function store(TransaksiPendapatanCreateForm $request)
    {
        return $this->transaksiPendapatan->create($request->all());
    }

    /**
     * Get transaksi pendapatan
     *
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show($id)
    {
        return $this->transaksiPendapatan->findById($id);
    }

    /**
     * Update transaksi pendapatan
     *
     * @param $id
     * @param TransaksiPendapatanEditForm $request
     * @return mixed
     */
    public function update($id, TransaksiPendapatanEditForm $request)
    {
        return $this->transaksiPendapatan->update($id, $request->all());
    }

    /**
     * Delete transaksi pendapatan
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->transaksiPendapatan->destroy($id);
    }

    /**
     * get pendapatan by organisasi id
     *
     * @param TransaksiPendapatanRepository
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiPendapatanByDesa($organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $this->transaksiPendapatan->getTransaksiPendapatanByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiPendapatanRepository
     * @return mixed
     */
    public function getChartByOrganisasiId()
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $this->transaksiPendapatan->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiPendapatanRepository
     * @return mixed
     */
    public function getChart()
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $this->transaksiPendapatan->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
