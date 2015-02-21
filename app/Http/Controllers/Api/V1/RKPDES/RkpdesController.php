<?php namespace SimdesApp\Http\Controllers\Api\V1\RKPDES;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RKPDES;
use SimdesApp\Repositories\RKPDES\RkpdesRepository;
use SimdesApp\Http\Requests\RKPDES\RkpdesCreateForm;
use SimdesApp\Http\Requests\RKPDES\RkpdesEditForm;

class RkpdesController extends Controller {

    public function index(RkpdesRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(RkpdesCreateForm $request, RkpdesRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(RkpdesRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, RkpdesEditForm $request, RkpdesRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, RkpdesRepository $program)
    {
        return $program->destroy($id);
    }
}
