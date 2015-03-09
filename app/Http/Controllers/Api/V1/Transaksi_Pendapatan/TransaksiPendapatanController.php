<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Pendapatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanCreateForm;
use SimdesApp\Http\Requests\Transaksi_Pendapatan\TransaksiPendapatanEditForm;
use SimdesApp\Repositories\Transaksi_Pendapatan\TransaksiPendapatanRepository;

class TransaksiPendapatanController extends Controller
{
    /**
     * Find transaksi pendapatan
     *
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function index(TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi pendapatan
     *
     * @param TransaksiPendapatanCreateForm $request
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function store(TransaksiPendapatanCreateForm $request, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->create($request->all());
    }

    /**
     * Get transaksi pendapatan
     *
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(TransaksiPendapatanRepository $transaksiPendapatan, $id)
    {
        return $transaksiPendapatan->findById($id);
    }

    /**
     * Update transaksi pendapatan
     *
     * @param $id
     * @param TransaksiPendapatanEditForm $request
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function update($id, TransaksiPendapatanEditForm $request, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->update($id, $request->all());
    }

    /**
     * Delete transaksi pendapatan
     *
     * @param $id
     * @param TransaksiPendapatanRepository $transaksiPendapatan
     * @return mixed
     */
    public function destroy($id, TransaksiPendapatanRepository $transaksiPendapatan)
    {
        return $transaksiPendapatan->destroy($id);
    }

    /**
     * get pendapatan by organisasi id
     *
     * @param TransaksiPendapatanRepository
     * @param $pendapatan
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiPendapatanByDesa(TransaksiPendapatanRepository $pendapatan, $organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $pendapatan->getTransaksiPendapatanByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiPendapatanRepository
     * @param $pendapatan
     * @return mixed
     */
    public function getChartByOrganisasiId(TransaksiPendapatanRepository $pendapatan)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $pendapatan->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiPendapatanRepository
     * @param $pendapatan
     * @return mixed
     */
    public function getChart(TransaksiPendapatanRepository $pendapatan)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $pendapatan->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
