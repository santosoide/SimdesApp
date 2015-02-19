<?php namespace SimdesApp\Http\Controllers\Api\V1\Kelompok;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kelompok;
use SimdesApp\Repositories\Kelompok\KelompokRepository;
use SimdesApp\Http\Requests\Kelompok\KelompokCreateForm;
use SimdesApp\Http\Requests\Kelompok\KelompokEditForm;

class KelompokController extends Controller {

    public function index(KelompokRepository $organisasi)
    {
        return $organisasi->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(KelompokCreateForm $request, KelompokRepository $organisasi)
    {
        return $organisasi->create($request->all());
    }

    public function show(KelompokRepository $organisasi, $id)
    {
        return $organisasi->findById($id);
    }

    public function update($id, KelompokEditForm $request, KelompokRepository $organisasi)
    {
        return $organisasi->update($id, $request->all());
    }

    public function destroy($id, KelompokRepository $organisasi)
    {
        return $organisasi->destroy($id);
    }
}
