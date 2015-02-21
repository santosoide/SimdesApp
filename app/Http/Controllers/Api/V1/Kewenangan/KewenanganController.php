<?php namespace SimdesApp\Http\Controllers\Api\V1\Kewenangan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kewenangan;
use SimdesApp\Repositories\Kewenangan\KewenanganRepository;
use SimdesApp\Http\Requests\Kewenangan\KewenanganCreateForm;
use SimdesApp\Http\Requests\Kewenangan\KewenanganEditForm;

class KewenanganController extends Controller {

    /**
     * Show data
     *
     * @param KewenanganRepository $kewenangan
     * @return mixed
     */
    public function index(KewenanganRepository $kewenangan)
    {
        return $kewenangan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Kewenangan
     *
     * @param KewenanganCreateForm $request
     * @param KewenanganRepository $kewenangan
     * @return mixed
     */
    public function store(KewenanganCreateForm $request, KewenanganRepository $kewenangan)
    {
        return $kewenangan->create($request->all());
    }

    /**
     * Show detail Kewenangan
     *
     * @param KewenanganRepository $kewenangan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(KewenanganRepository $kewenangan, $id)
    {
        return $kewenangan->findById($id);
    }

    /**
     * Update data Kewenangan
     *
     * @param $id
     * @param KewenanganEditForm $request
     * @param KewenanganRepository $kewenangan
     * @return mixed
     */
    public function update($id, KewenanganEditForm $request, KewenanganRepository $kewenangan)
    {
        return $kewenangan->update($id, $request->all());
    }

    /**
     * Delete data Kewenangan
     *
     * @param $id
     * @param KewenanganRepository $kewenangan
     * @return mixed
     */
    public function destroy($id, KewenanganRepository $kewenangan)
    {
        return $kewenangan->destroy($id);
    }
}
