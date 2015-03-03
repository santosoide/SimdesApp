<?php namespace SimdesApp\Http\Controllers\Api\V1\Pendapatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Pendapatan;
use SimdesApp\Repositories\Pendapatan\PendapatanRepository;
use SimdesApp\Http\Requests\Pendapatan\PendapatanCreateForm;
use SimdesApp\Http\Requests\Pendapatan\PendapatanEditForm;

class PendapatanController extends Controller
{

    /**
     * Show pendapatan
     *
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function index(PendapatanRepository $pendapatan)
    {
        return $pendapatan->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Insert pendapatan
     *
     * @param PendapatanCreateForm $request
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function store(PendapatanCreateForm $request, PendapatanRepository $pendapatan)
    {
        return $pendapatan->create($request->all());
    }

    /**
     * Get Pendapatan
     *
     * @param PendapatanRepository $pendapatan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(PendapatanRepository $pendapatan, $id)
    {
        return $pendapatan->findById($id);
    }

    /**
     * Update pendapatan
     *
     * @param $id
     * @param PendapatanEditForm $request
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function update($id, PendapatanEditForm $request, PendapatanRepository $pendapatan)
    {
        return $pendapatan->update($id, $request->all());
    }

    /**
     * Delete pendapatan
     *
     * @param $id
     * @param PendapatanRepository $pendapatan
     * @return mixed
     */
    public function destroy($id, PendapatanRepository $pendapatan)
    {
        return $pendapatan->destroy($id);
    }

    /**
     * get pendapatan by organisasi id
     *
     * @param PendapatanRepository
     * @param $pendapatan
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiPendapatanByDesa(PendapatanRepository $pendapatan, $organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $pendapatan->getTransaksiPendapatanByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param PendapatanRepository
     * @param $pendapatan
     * @return mixed
     */
    public function getChartByOrganisasiId(PendapatanRepository $pendapatan)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $pendapatan->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param PendapatanRepository
     * @param $pendapatan
     * @return mixed
     */
    public function getChart(PendapatanRepository $pendapatan)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $pendapatan->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
