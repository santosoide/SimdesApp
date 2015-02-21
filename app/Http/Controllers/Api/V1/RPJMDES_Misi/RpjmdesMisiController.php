<?php namespace SimdesApp\Http\Controllers\Api\V1\RPJMDES_Misi;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RPJMDES_Misi;
use SimdesApp\Repositories\RPJMDES_Misi\RpjmdesMisiRepository;
use SimdesApp\Http\Requests\RPJMDES_Misi\RpjmdesMisiCreateForm;
use SimdesApp\Http\Requests\RPJMDES_Misi\RpjmdesMisiEditForm;

class RpjmdesMisiController extends Controller {

    public function index(RpjmdesMisiRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(RpjmdesMisiCreateForm $request, RpjmdesMisiRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(RpjmdesMisiRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, RpjmdesMisiEditForm $request, RpjmdesMisiRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, RpjmdesMisiRepository $program)
    {
        return $program->destroy($id);
    }
}
