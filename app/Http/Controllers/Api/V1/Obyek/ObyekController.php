<?php namespace SimdesApp\Http\Controllers\Api\V1\Obyek;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Obyek;
use SimdesApp\Repositories\Obyek\ObyekRepository;
use SimdesApp\Http\Requests\Obyek\ObyekCreateForm;
use SimdesApp\Http\Requests\Obyek\ObyekEditForm;

class ObyekController extends Controller {

    public function index(ObyekRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(ObyekCreateForm $request, ObyekRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    public function show(ObyekRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    public function update($id, ObyekEditForm $request, ObyekRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    public function destroy($id, ObyekRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
