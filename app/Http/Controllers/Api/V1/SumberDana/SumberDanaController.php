<?php namespace SimdesApp\Http\Controllers\Api\V1\SumberDana;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\SumberDana;
use SimdesApp\Repositories\Contracts\SumberDanaInterface;
use SimdesApp\Repositories\SumberDana\SumberDanaRepository;
use SimdesApp\Http\Requests\SumberDana\SumberDanaCreateForm;
use SimdesApp\Http\Requests\SumberDana\SumberDanaEditForm;

class SumberDanaController extends Controller
{

    /**
     * @var
     */
    protected $sumberDana;

    /**
     * Create new SumberDanaController Instance
     *
     * @param SumberDanaInterface $sumberDana
     */
    public function  __construct(SumberDanaInterface $sumberDana)
    {
        $this->sumberDana = $sumberDana;
    }

    /**
     * Show data
     *
     * @param SumberDanaRepository $program
     * @return mixed
     */
    public function index(SumberDanaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Sumber Dana
     *
     * @param SumberDanaCreateForm $request
     * @param SumberDanaRepository $program
     * @return mixed
     */
    public function store(SumberDanaCreateForm $request, SumberDanaRepository $program)
    {
        return $program->create($request->all());
    }

    /**
     * Show detail Sumber Dana
     *
     * @param SumberDanaRepository $program
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(SumberDanaRepository $program, $id)
    {
        return $program->findById($id);
    }

    /**
     * Update data Sumber Dana
     *
     * @param $id
     * @param SumberDanaEditForm $request
     * @param SumberDanaRepository $program
     * @return mixed
     */
    public function update($id, SumberDanaEditForm $request, SumberDanaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    /**
     * Delete data Sumber Dana
     *
     * @param $id
     * @param SumberDanaRepository $program
     * @return mixed
     */
    public function destroy($id, SumberDanaRepository $program)
    {
        return $program->destroy($id);
    }
}
