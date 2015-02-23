<?php namespace SimdesApp\Http\Controllers\Api\V1\RPJMDES;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RPJMDES;
use SimdesApp\Repositories\RPJMDES\RpjmdesRepository;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesCreateForm;
use SimdesApp\Http\Requests\RPJMDES\RpjmdesEditForm;

class RpjmdesController extends Controller {

    /**
     * Show data
     *
     * @param RpjmdesRepository $program
     * @return mixed
     */
    public function index(RpjmdesRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Create data RPJMDES
     *
     * @param RpjmdesCreateForm $request
     * @param RpjmdesRepository $program
     * @return mixed
     */
    public function store(RpjmdesCreateForm $request, RpjmdesRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail RPJMDES
     *
     * @param RpjmdesRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(RpjmdesRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data RPJMDES
     *
     * @param $id
     * @param RpjmdesEditForm $request
     * @param RpjmdesRepository $program
     * @return mixed
     */
    public function update($id, RpjmdesEditForm $request, RpjmdesRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data RPJMDES
     *
     * @param $id
     * @param RpjmdesRepository $program
     * @return mixed
     */
    public function destroy($id, RpjmdesRepository $program)
    {
        return $program->destroy($id);
    }
}
