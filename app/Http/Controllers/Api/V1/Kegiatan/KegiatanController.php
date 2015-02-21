<?php namespace SimdesApp\Http\Controllers\Api\V1\Kegiatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kegiatan;
use SimdesApp\Repositories\Kegiatan\KegiatanRepository;
use SimdesApp\Http\Requests\Kegiatan\KegiatanCreateForm;
use SimdesApp\Http\Requests\Kegiatan\KegiatanEditForm;

class KegiatanController extends Controller {

    /**
     * Show data
     *
     * @param KegiatanRepository $obyek
     * @return mixed
     */
    public function index(KegiatanRepository $obyek)
    {
        return $obyek->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Kegiatan
     *
     * @param KegiatanCreateForm $request
     * @param KegiatanRepository $obyek
     * @return mixed
     */
    public function store(KegiatanCreateForm $request, KegiatanRepository $obyek)
    {
        return $obyek->create($request->all());
    }

    /**
     * Show detail Kegiatan
     *
     * @param KegiatanRepository $obyek
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(KegiatanRepository $obyek, $id)
    {
        return $obyek->findById($id);
    }

    /**
     * Update data Kegiatan
     *
     * @param $id
     * @param KegiatanEditForm $request
     * @param KegiatanRepository $obyek
     * @return mixed
     */
    public function update($id, KegiatanEditForm $request, KegiatanRepository $obyek)
    {
        return $obyek->update($id, $request->all());
    }

    /**
     * Delete data Kegiatan
     *
     * @param $id
     * @param KegiatanRepository $obyek
     * @return mixed
     */
    public function destroy($id, KegiatanRepository $obyek)
    {
        return $obyek->destroy($id);
    }
}
