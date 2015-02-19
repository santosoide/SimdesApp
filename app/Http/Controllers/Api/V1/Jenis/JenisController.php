<?php
namespace SimdesApp\Http\Controllers\Api\V1\Jenis;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Jenis;
use SimdesApp\Repositories\Jenis\JenisRepository;
use SimdesApp\Http\Requests\Jenis\JenisCreateForm;
use SimdesApp\Http\Requests\Jenis\JenisEditForm;

class JenisController extends Controller {

    public function index(JenisRepository $jenis)
    {
        return $jenis->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(JenisCreateForm $request, JenisRepository $jenis)
    {
        return $jenis->create($request->all());
    }

    public function show(JenisRepository $jenis, $id)
    {
        return $jenis->findById($id);
    }

    public function update($id, JenisEditForm $request, JenisRepository $jenis)
    {
        return $jenis->update($id, $request->all());
    }

    public function destroy($id, JenisRepository $jenis)
    {
        return $jenis->destroy($id);
    }
}
