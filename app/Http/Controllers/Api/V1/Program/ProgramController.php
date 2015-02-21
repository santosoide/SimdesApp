<?php namespace SimdesApp\Http\Controllers\Api\V1\Program;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Program;
use SimdesApp\Repositories\Program\ProgramRepository;
use SimdesApp\Http\Requests\Program\ProgramCreateForm;
use SimdesApp\Http\Requests\Program\ProgramEditForm;

class ProgramController extends Controller {

    /**
     * Show data
     *
     * @param ProgramRepository $organisasi
     * @return mixed
     */
    public function index(ProgramRepository $organisasi)
    {
        return $organisasi->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Program
     *
     * @param ProgramCreateForm $request
     * @param ProgramRepository $organisasi
     * @return mixed
     */
    public function store(ProgramCreateForm $request, ProgramRepository $organisasi)
    {
        return $organisasi->create($request->all());
    }

    /**
     * Show detail Program
     *
     * @param ProgramRepository $organisasi
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(ProgramRepository $organisasi, $id)
    {
        return $organisasi->findById($id);
    }

    /**
     * Update data Program
     *
     * @param $id
     * @param ProgramEditForm $request
     * @param ProgramRepository $organisasi
     * @return mixed
     */
    public function update($id, ProgramEditForm $request, ProgramRepository $organisasi)
    {
        return $organisasi->update($id, $request->all());
    }

    /**
     * Delete data Program
     *
     * @param $id
     * @param ProgramRepository $organisasi
     * @return mixed
     */
    public function destroy($id, ProgramRepository $organisasi)
    {
        return $organisasi->destroy($id);
    }
}
