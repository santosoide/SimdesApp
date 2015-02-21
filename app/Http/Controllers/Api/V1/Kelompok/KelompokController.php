<?php namespace SimdesApp\Http\Controllers\Api\V1\Kelompok;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Kelompok;
use SimdesApp\Repositories\Kelompok\KelompokRepository;
use SimdesApp\Http\Requests\Kelompok\KelompokCreateForm;
use SimdesApp\Http\Requests\Kelompok\KelompokEditForm;

class KelompokController extends Controller {

    /**
     * Show data
     * URL = url/api/v1/backoffice/kelompok GET
     *
     * @param KelompokRepository $organisasi
     * @return mixed
     */
    public function index(KelompokRepository $organisasi)
    {
        return $organisasi->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Kelompok
     * URL = url/api/v1/backoffice/kelompok POST
     *
     * @param KelompokCreateForm $request
     * @param KelompokRepository $organisasi
     * @return mixed
     */
    public function store(KelompokCreateForm $request, KelompokRepository $organisasi)
    {
        return $organisasi->create($request->all());
    }

    /**
     * Show detail Kelompok
     * URL = url/api/v1/backoffice/kelompok/1 GET
     *
     * @param KelompokRepository $organisasi
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(KelompokRepository $organisasi, $id)
    {
        return $organisasi->findById($id);
    }

    /**
     * Update Kelompok
     * URL = url/api/v1/backoffice/kelompok/1 PUT
     *
     * @param $id
     * @param KelompokEditForm $request
     * @param KelompokRepository $organisasi
     * @return mixed
     */
    public function update($id, KelompokEditForm $request, KelompokRepository $organisasi)
    {
        return $organisasi->update($id, $request->all());
    }

    /**
     * Delete Kelompok
     * URL = url/api/v1/backoffice/kelompok/1 DELETE
     *
     * @param $id
     * @param KelompokRepository $organisasi
     * @return mixed
     */
    public function destroy($id, KelompokRepository $organisasi)
    {
        return $organisasi->destroy($id);
    }
}
