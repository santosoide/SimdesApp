<?php
namespace SimdesApp\Http\Controllers\Api\V1\Jenis;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Jenis;
use SimdesApp\Repositories\Jenis\JenisRepository;
use SimdesApp\Http\Requests\Jenis\JenisCreateForm;
use SimdesApp\Http\Requests\Jenis\JenisEditForm;

class JenisController extends Controller {

    /**
     * Show data
     * URL = url/api/v1/backoffice/jenis GET
     *
     * @param JenisRepository $jenis
     * @return mixed
     */
    public function index(JenisRepository $jenis)
    {
        return $jenis->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create data Jenis
     * URL = url/api/v1/backoffice/jenis POST
     *
     * @param JenisCreateForm $request
     * @param JenisRepository $jenis
     * @return mixed
     */
    public function store(JenisCreateForm $request, JenisRepository $jenis)
    {
        return $jenis->create($request->all());
    }

    /**
     * Show detail Jenis
     * URL = url/api/v1/backoffice/jenis/1 GET
     *
     * @param JenisRepository $jenis
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(JenisRepository $jenis, $id)
    {
        return $jenis->findById($id);
    }

    /**
     * Update data Jenis
     * URL = url/api/v1/backoffice/jenis/1 PUT
     *
     * @param $id
     * @param JenisEditForm $request
     * @param JenisRepository $jenis
     * @return mixed
     */
    public function update($id, JenisEditForm $request, JenisRepository $jenis)
    {
        return $jenis->update($id, $request->all());
    }

    /**
     * Delete data Jenis
     * URL = url/api/v1/backoffice/jenis/1 DELETE
     *
     * @param $id
     * @param JenisRepository $jenis
     * @return mixed
     */
    public function destroy($id, JenisRepository $jenis)
    {
        return $jenis->destroy($id);
    }
}
