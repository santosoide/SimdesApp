<?php namespace SimdesApp\Http\Controllers\Api\V1\Akun;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Http\Controllers\Api\V1\Akun;
use SimdesApp\Repositories\Akun\AkunRepository;
use SimdesApp\Http\Requests\Akun\AkunCreateForm;
use SimdesApp\Http\Requests\Akun\AkunEditForm;

class AkunController extends Controller {

    /**
     * Show akun
     * URL = url/api/v1/backoffice/akun GET
     *
     * @param AkunRepository $akun
     * @return mixed
     */
    public function index(AkunRepository $akun)
    {
        return $akun->find($this->input('page'), $limit = 10, $this->input('term'));
    }

    /**
     * Create akun
     * URL = url/api/v1/backoffice/akun POST
     *
     * @param AkunCreateForm $request
     * @param AkunRepository $akun
     * @return mixed
     */
    public function store(AkunCreateForm $request, AkunRepository $akun)
    {
        return $akun->create($request->all());
    }

    /**
     * Show detail akun
     * URL = url/api/v1/backoffice/akun/1 GET
     *
     * @param AkunRepository $akun
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function show(AkunRepository $akun, $id)
    {
        return $akun->findById($id);
    }

    /**
     * Update akun
     * URL = url/api/v1/backoffice/akun/1 PUT
     *
     * @param $id
     * @param AkunEditForm $request
     * @param AkunRepository $akun
     * @return mixed
     */
    public function update($id, AkunEditForm $request, AkunRepository $akun)
    {
        return $akun->update($id, $request->all());
    }

    /**
     * Delete akun
     * URL = url/api/v1/backoffice/akun/1 DELETE
     *
     * @param $id
     * @param AkunRepository $akun
     * @return mixed
     */
    public function destroy($id, AkunRepository $akun)
    {
        return $akun->destroy($id);
    }
}
