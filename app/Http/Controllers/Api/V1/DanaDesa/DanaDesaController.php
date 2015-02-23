<?php namespace SimdesApp\Http\Controllers\Api\V1\DanaDesa;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaCreateForm;
use SimdesApp\Http\Requests\DanaDesa\DanaDesaEditForm;
use SimdesApp\Repositories\DanaDesa\DanaDesaRepository;

class DanaDesaController extends Controller
{

    /**
     * Find dana desa
     *
     * @param DanaDesaRepository $danaDesa
     * @return mixed
     */
    public function index(DanaDesaRepository $danaDesa)
    {
        return $danaDesa->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert dana desa
     *
     * @param DanaDesaCreateForm $request
     * @param DanaDesaRepository $danaDesa
     * @return mixed
     */
    public function store(DanaDesaCreateForm $request, DanaDesaRepository $danaDesa)
    {
        return $danaDesa->create($request->all());
    }

    /**
     * Get dana desa
     *
     * @param DanaDesaRepository $danaDesa
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(DanaDesaRepository $danaDesa, $id)
    {
        return $danaDesa->findById($id);
    }

    /**
     * Update dana desa
     *
     * @param $id
     * @param DanaDesaEditForm $request
     * @param DanaDesaRepository $danaDesa
     * @return mixed
     */
    public function update($id, DanaDesaEditForm $request, DanaDesaRepository $danaDesa)
    {
        return $danaDesa->update($id, $request->all());
    }

    /**
     * Delete dana desa
     *
     * @param $id
     * @param DanaDesaRepository $danaDesa
     * @return mixed
     */
    public function destroy($id, DanaDesaRepository $danaDesa)
    {
        return $danaDesa->destroy($id);
    }
}
