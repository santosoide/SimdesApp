<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Akun\AkunRepository;

class AjaxAkunController extends Controller {

    /**
     * Get Akun list using by Ajax Dropdown
     *
     * @param AkunRepository $akun
     * @return mixed
     */
    public function getList(AkunRepository $akun)
    {
        return $akun->getList();
    }
}
