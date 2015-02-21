<?php namespace SimdesApp\Http\Controllers\Api\V1\RPJMDES;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RPJMDES;
use SimdesApp\Repositories\RPJMDES\RpjmdesRepository;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesCreateForm;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesEditForm;

class RpjmdesController extends Controller {

    public function index(RpjmdesRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(RpjmdesCreateForm $request, RpjmdesRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(RpjmdesRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, RpjmdesEditForm $request, RpjmdesRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, RpjmdesRepository $program)
    {
        return $program->destroy($id);
    }
}
