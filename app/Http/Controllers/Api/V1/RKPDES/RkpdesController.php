<?php namespace SimdesApp\Http\Controllers\Api\V1\RKPDES;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RKPDES;
use SimdesApp\Repositories\RKPDES\RkpdesRepository;
use SimdesApp\Http\Requests\RKPDES\RkpdesCreateForm;
use SimdesApp\Http\Requests\RKPDES\RkpdesEditForm;

class RkpdesController extends Controller {

    /**
     * Show data RKPDES
     *
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function index(RkpdesRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data RKPDES
     *
     * @param RkpdesCreateForm $request
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function store(RkpdesCreateForm $request, RkpdesRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail RKPDES
     *
     * @param RkpdesRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(RkpdesRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data RKPDES
     *
     * @param $id
     * @param RkpdesEditForm $request
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function update($id, RkpdesEditForm $request, RkpdesRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data RKPDES
     *
     * @param $id
     * @param RkpdesRepository $program
     * @return mixed
     */
    public function destroy($id, RkpdesRepository $program)
    {
        return $program->destroy($id);
    }
}
