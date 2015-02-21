<?php namespace SimdesApp\Http\Controllers\Api\V1\Pembiayaan;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Requests\Pembiayaan\PembiayaanCreateForm;
use SimdesApp\Http\Requests\Pembiayaan\PembiayaanEditForm;
use SimdesApp\Repositories\Pembiayaan\PembiayaanRepository;

class PembiayaanController extends Controller
{
    /**
     * Show pembiayaan
     *
     * @param PembiayaanRepository $pembiayaan
     * @return mixed
     */
    public function index(PembiayaanRepository $pembiayaan)
    {
        return $pembiayaan->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Insert pembiayaan
     *
     * @param PembiayaanCreateForm $request
     * @param PembiayaanRepository $pembiayaan
     * @return mixed
     */
    public function store(PembiayaanCreateForm $request, PembiayaanRepository $pembiayaan)
    {
        return $pembiayaan->create($request->all());
    }

    /**
     * Get pembiayaan
     *
     * @param PembiayaanRepository $pembiayaan
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(PembiayaanRepository $pembiayaan, $id)
    {
        return $pembiayaan->findById($id);
    }

    /**
     * Update pembiayaan
     *
     * @param $id
     * @param PembiayaanEditForm $request
     * @param PembiayaanRepository $pembiayaan
     * @return mixed
     */
    public function update($id, PembiayaanEditForm $request, PembiayaanRepository $pembiayaan)
    {
        return $pembiayaan->update($id, $request->all());
    }

    /**
     * Delete pembiayaan
     *
     * @param $id
     * @param PembiayaanRepository $pembiayaan
     * @return mixed
     */
    public function destroy($id, PembiayaanRepository $pembiayaan)
    {
        return $pembiayaan->destroy($id);
    }

}
