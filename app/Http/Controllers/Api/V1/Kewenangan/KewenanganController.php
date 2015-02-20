<?php namespace SimdesApp\Http\Controllers\Api\V1\Kewenangan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kewenangan;
use SimdesApp\Repositories\Kewenangan\KewenanganRepository;
use SimdesApp\Http\Requests\Kewenangan\KewenanganCreateForm;
use SimdesApp\Http\Requests\Kewenangan\KewenanganEditForm;

class KewenanganController extends Controller {

    public function index(KewenanganRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(KewenanganCreateForm $request, KewenanganRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    public function show(KewenanganRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    public function update($id, KewenanganEditForm $request, KewenanganRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    public function destroy($id, KewenanganRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
