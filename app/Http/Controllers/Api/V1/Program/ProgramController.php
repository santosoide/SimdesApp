<?php namespace SimdesApp\Http\Controllers\Api\V1\Program;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Program;
use SimdesApp\Repositories\Program\ProgramRepository;
use SimdesApp\Http\Requests\Program\ProgramCreateForm;
use SimdesApp\Http\Requests\Program\ProgramEditForm;

class ProgramController extends Controller {

    public function index(ProgramRepository $organisasi)
    {
        return $organisasi->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(ProgramCreateForm $request, ProgramRepository $organisasi)
    {
        return $organisasi->create($request->all());
    }

    public function show(ProgramRepository $organisasi, $id)
    {
        return $organisasi->findById($id);
    }

    public function update($id, ProgramEditForm $request, ProgramRepository $organisasi)
    {
        return $organisasi->update($id, $request->all());
    }

    public function destroy($id, ProgramRepository $organisasi)
    {
        return $organisasi->destroy($id);
    }
}
