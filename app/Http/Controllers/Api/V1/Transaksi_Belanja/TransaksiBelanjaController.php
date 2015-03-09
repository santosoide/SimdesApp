<?php namespace SimdesApp\Http\Controllers\Api\V1\Transaksi_Belanja;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaCreatForm;
use SimdesApp\Http\Requests\Transaksi_Belanja\TransaksiBelanjaEditForm;
use SimdesApp\Repositories\Transaksi_Belanja\TransaksiBelanjaRepository;

class TransaksiBelanjaController extends Controller
{
    /**
     * Find transaksi belanja
     *
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function index(TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert transaksi belanja
     *
     * @param TransaksiBelanjaCreatForm $request
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function store(TransaksiBelanjaCreatForm $request, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->create($request->all());
    }

    /**
     * Get transaksi belanja
     *
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(TransaksiBelanjaRepository $transaksiBelanja, $id)
    {
        return $transaksiBelanja->findById($id);
    }

    /**
     * Update transaksi belanja
     *
     * @param $id
     * @param TransaksiBelanjaEditForm $request
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function update($id, TransaksiBelanjaEditForm $request, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->update($id, $request->all());
    }

    /**
     * Delete transaksi belanja
     *
     * @param $id
     * @param TransaksiBelanjaRepository $transaksiBelanja
     * @return mixed
     */
    public function destroy($id, TransaksiBelanjaRepository $transaksiBelanja)
    {
        return $transaksiBelanja->destroy($id);
    }

    /**
     * get belanja by organisasi id
     *
     * @param TransaksiBelanjaRepository
     * @param $belanja
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiBelanjaByDesa(TransaksiBelanjaRepository $belanja, $organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $belanja->getTransaksiBelanjaByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiBelanjaRepository
     * @param $belanja
     * @return mixed
     */
    public function getChartByOrganisasiId(TransaksiBelanjaRepository $belanja)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $belanja->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param TransaksiBelanjaRepository
     * @param $belanja
     * @return mixed
     */
    public function getChart(TransaksiBelanjaRepository $belanja)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $belanja->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
