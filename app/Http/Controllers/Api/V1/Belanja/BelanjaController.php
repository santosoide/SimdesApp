<?php namespace SimdesApp\Http\Controllers\Api\V1\Belanja;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Belanja\BelanjaCreateForm;
use SimdesApp\Http\Requests\Belanja\BelanjaEditForm;
use SimdesApp\Repositories\Belanja\BelanjaRepository;

class BelanjaController extends Controller
{

    /**
     * Show belanja
     *
     * @param BelanjaRepository $belanja
     * @return mixed
     */
    public function index(BelanjaRepository $belanja)
    {
        return $belanja->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Insert belanja
     *
     * @param BelanjaCreateForm $request
     * @param BelanjaRepository $belanja
     * @return mixed
     */
    public function store(BelanjaCreateForm $request, BelanjaRepository $belanja)
    {
        return $belanja->create($request->all());
    }

    /**
     * Get belanja
     *
     * @param BelanjaRepository $belanja
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(BelanjaRepository $belanja, $id)
    {
        return $belanja->findById($id);
    }

    /**
     * Update belanja
     *
     * @param $id
     * @param BelanjaEditForm $request
     * @param BelanjaRepository $belanja
     * @return mixed
     */
    public function update($id, BelanjaEditForm $request, BelanjaRepository $belanja)
    {
        return $belanja->update($id, $request->all());
    }

    /**
     * Delete belanja
     *
     * @param $id
     * @param BelanjaRepository $belanja
     * @return mixed
     */
    public function destroy($id, BelanjaRepository $belanja)
    {
        return $belanja->destroy($id);
    }

    /**
     * get belanja by organisasi id
     *
     * @param BelanjaRepository
     * @param $belanja
     * @param $organisasi_id
     * @return mixed
     */
    public function getTransaksiBelanjaByDesa(BelanjaRepository $belanja, $organisasi_id)
    {
        $term = $this->input('term');
        $page = $this->input('page');

        return $belanja->getTransaksiBelanjaByDesa($page, $per_page = 5, $term, $organisasi_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param BelanjaRepository
     * @param $belanja
     * @return mixed
     */
    public function getChartByOrganisasiId(BelanjaRepository $belanja)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $belanja->getChartByOrganisasiId($this->getOrganisasiId(), $tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }

    /**
     * find tanggal and jumlah with between tanggal
     *
     * @param BelanjaRepository
     * @param $belanja
     * @return mixed
     */
    public function getChart(BelanjaRepository $belanja)
    {
        $tanggal_awal = $this->input('tanggal_awal');
        $tanggal_akhir = $this->input('tanggal_akhir');
        $dana_desa_id = $this->input('dana_desa_id');

        return $belanja->getChart($tanggal_awal, $tanggal_akhir, $dana_desa_id);
    }
}
