<?php namespace SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\StandarSatuanHarga;
use SimdesApp\Repositories\StandarSatuanHarga\StandarSatuanHargaRepository;
use SimdesApp\Http\Requests\StandarSatuanHarga\StandarSatuanHargaCreateForm;
use SimdesApp\Http\Requests\StandarSatuanHarga\StandarSatuanHargaEditForm;

class StandarSatuanHargaController extends Controller {

    public function index(StandarSatuanHargaRepository $program)
    {
        return $program->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(StandarSatuanHargaCreateForm $request, StandarSatuanHargaRepository $program)
    {
        return $program->create($request->all());
    }

    public function show(StandarSatuanHargaRepository $program, $id)
    {
        return $program->findById($id);
    }

    public function update($id, StandarSatuanHargaEditForm $request, StandarSatuanHargaRepository $program)
    {
        return $program->update($id, $request->all());
    }

    public function destroy($id, StandarSatuanHargaRepository $program)
    {
        return $program->destroy($id);
    }
}
