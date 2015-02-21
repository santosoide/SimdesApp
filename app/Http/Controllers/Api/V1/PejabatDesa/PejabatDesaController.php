<?php namespace SimdesApp\Http\Controllers\Api\V1\PejabatDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\PejabatDesa;
use SimdesApp\Repositories\PejabatDesa\PejabatDesaRepository;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaCreateForm;
use SimdesApp\Http\Requests\PejabatDesa\PejabatDesaEditForm;

class PejabatDesaController extends Controller {

    public function index(PejabatDesaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(PejabatDesaCreateForm $request, PejabatDesaRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(PejabatDesaRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, PejabatDesaEditForm $request, PejabatDesaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, PejabatDesaRepository $program)
    {
        return $program->destroy($id);
    }
}
