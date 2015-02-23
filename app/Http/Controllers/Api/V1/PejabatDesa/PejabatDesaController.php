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
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
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
}