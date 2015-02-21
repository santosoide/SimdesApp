<?php namespace SimdesApp\Http\Controllers\Api\V1\Obyek;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Obyek;
use SimdesApp\Repositories\Obyek\ObyekRepository;
use SimdesApp\Http\Requests\Obyek\ObyekCreateForm;
use SimdesApp\Http\Requests\Obyek\ObyekEditForm;

class ObyekController extends Controller {

    /**
     * Show data
     *
     * @param ObyekRepository $obyek
     * @return mixed
     */
    public function index(ObyekRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data
     *
     * @param ObyekCreateForm $request
     * @param ObyekRepository $obyek
     * @return mixed
     */
    public function store(ObyekCreateForm $request, ObyekRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    /**
     * Show detail data
     *
     * @param ObyekRepository $obyek
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(ObyekRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    /**
     * Update data
     *
     * @param $id
     * @param ObyekEditForm $request
     * @param ObyekRepository $obyek
     * @return mixed
     */
    public function update($id, ObyekEditForm $request, ObyekRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    /**
     * Delete data
     *
     * @param $id
     * @param ObyekRepository $obyek
     * @return mixed
     */
    public function destroy($id, ObyekRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
