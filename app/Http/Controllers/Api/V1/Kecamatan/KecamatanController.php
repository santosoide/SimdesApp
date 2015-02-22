<?php namespace SimdesApp\Http\Controllers\Api\V1\Kecamatan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Kecamatan\KecamatanCreateForm;
use SimdesApp\Http\Requests\Kecamatan\KecamatanEditForm;
use SimdesApp\Repositories\Kecamatan\KecamatanRepository;

class KecamatanController extends Controller
{
    /**
     * Find kecamatan
     *
     * @param KecamatanRepository $kecamatan
     * @return mixed
     */
    public function index(KecamatanRepository $kecamatan)
    {
        return $kecamatan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert kecamatan
     *
     * @param KecamatanCreateForm $request
     * @param KecamatanRepository $kecamatan
     * @return mixed
     */
    public function store(KecamatanCreateForm $request, KecamatanRepository $kecamatan)
    {
        return $kecamatan->create($request->all());
    }

    /**
     * Get kecamatan
     *
     * @param KecamatanRepository $kecamatan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(KecamatanRepository $kecamatan, $id)
    {
        return $kecamatan->findById($id);
    }

    /**
     * Update kecamatan
     *
     * @param $id
     * @param KecamatanEditForm $request
     * @param KecamatanRepository $kecamatan
     * @return mixed
     */
    public function update($id, KecamatanEditForm $request, KecamatanRepository $kecamatan)
    {
        return $kecamatan->update($id, $request->all());
    }

    /**
     * Delete kecamatan
     *
     * @param $id
     * @param KecamatanRepository $kecamatan
     * @return mixed
     */
    public function destroy($id, KecamatanRepository $kecamatan)
    {
        return $kecamatan->destroy($id);
    }
}
