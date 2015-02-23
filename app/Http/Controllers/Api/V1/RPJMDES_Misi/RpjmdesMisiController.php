<?php namespace SimdesApp\Http\Controllers\Api\V1\RPJMDES_Misi;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\RPJMDES_Misi;
use SimdesApp\Repositories\RPJMDES_Misi\RpjmdesMisiRepository;
use SimdesApp\Http\Requests\RPJMDES_Misi\RpjmdesMisiCreateForm;
use SimdesApp\Http\Requests\RPJMDES_Misi\RpjmdesMisiEditForm;

class RpjmdesMisiController extends Controller {

    /**
     * Show data RPJMDES Misi
     *
     * @param RpjmdesMisiRepository $program
     * @return mixed
     */
    public function index(RpjmdesMisiRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'), $this->input('organisasi_id'));
    }

    /**
     * Create data RPJMDES Misi
     *
     * @param RpjmdesMisiCreateForm $request
     * @param RpjmdesMisiRepository $program
     * @return mixed
     */
    public function store(RpjmdesMisiCreateForm $request, RpjmdesMisiRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail RPJMDES Misi
     *
     * @param RpjmdesMisiRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(RpjmdesMisiRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data RPJMDES Misi
     *
     * @param $id
     * @param RpjmdesMisiEditForm $request
     * @param RpjmdesMisiRepository $program
     * @return mixed
     */
    public function update($id, RpjmdesMisiEditForm $request, RpjmdesMisiRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data RPJMDES Misi
     *
     * @param $id
     * @param RpjmdesMisiRepository $program
     * @return mixed
     */
    public function destroy($id, RpjmdesMisiRepository $program)
    {
        return $program->destroy($id);
    }
}
