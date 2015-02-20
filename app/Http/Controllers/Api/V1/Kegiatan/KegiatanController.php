<?php namespace SimdesApp\Http\Controllers\Api\V1\Kegiatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kegiatan;
use SimdesApp\Repositories\Kegiatan\KegiatanRepository;
use SimdesApp\Http\Requests\Kegiatan\KegiatanCreateForm;
use SimdesApp\Http\Requests\Kegiatan\KegiatanEditForm;

class KegiatanController extends Controller {

    public function index(KegiatanRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    public function store(KegiatanCreateForm $request, KegiatanRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    public function show(KegiatanRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    public function update($id, KegiatanEditForm $request, KegiatanRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    public function destroy($id, KegiatanRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
