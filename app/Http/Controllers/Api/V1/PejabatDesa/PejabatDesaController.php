<?php namespace SimdesApp\Http\Controllers\Api\V1\PejabatDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\PejabatDesa;
use SimdesApp\Repositories\PejabatDesa\PejabatDesaRepository;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaCreateForm;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaEditForm;

class PejabatDesaController extends Controller {

    /**
     * Show data Pejabat Desa
     *
     * @param PejabatDesaRepository $program
     * @return mixed
     */
    public function index(PejabatDesaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Create data Pejabat Desa
     *
     * @param PejabatDesaCreateForm $request
     * @param PejabatDesaRepository $program
     * @return mixed
     */
    public function store(PejabatDesaCreateForm $request, PejabatDesaRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail Pejabat Desa
     *
     * @param PejabatDesaRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(PejabatDesaRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data Pejabat Desa
     *
     * @param $id
     * @param PejabatDesaEditForm $request
     * @param PejabatDesaRepository $program
     * @return mixed
     */
    public function update($id, PejabatDesaEditForm $request, PejabatDesaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data Pejabat Desa
     *
     * @param $id
     * @param PejabatDesaRepository $program
     * @return mixed
     */
    public function destroy($id, PejabatDesaRepository $program)
    {
        return $program->destroy($id);
    }

    /**
     * Get the list pejabat desa by organisasi_id using on detil organisasi
     *
     * @param PejabatDesaRepository $pejabatDesa
     * @param $organisasi_id
     * @return mixed
     */
    public function listPejabatDesa(PejabatDesaRepository $pejabatDesa, $organisasi_id)
    {
        return $pejabatDesa->listByOrganisasiId($organisasi_id);
    }

    /**
     * Get the list pejabat desa by organisasi_id using on rpjmdes_program
     *
     * @param PejabatDesaRepository $pejabatDesa
     * @return mixed
     */
    public function getListPejabatDesa(PejabatDesaRepository $pejabatDesa)
    {
        return $pejabatDesa->getListByOrganisasiId($this->getOrganisasiId());
    }
}
