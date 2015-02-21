<?php namespace SimdesApp\Http\Controllers\Api\V1\SumberDana;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\SumberDana;
use SimdesApp\Repositories\SumberDana\SumberDanaRepository;
use SimdesApp\Http\Requests\SumberDana\SumberDanaCreateForm;
use SimdesApp\Http\Requests\SumberDana\SumberDanaEditForm;

class SumberDanaController extends Controller {

    public function index(SumberDanaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(SumberDanaCreateForm $request, SumberDanaRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(SumberDanaRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, SumberDanaEditForm $request, SumberDanaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, SumberDanaRepository $program)
    {
        return $program->destroy($id);
    }
}
