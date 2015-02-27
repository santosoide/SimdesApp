<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Kecamatan\KecamatanRepository;

class AjaxKecamatanController extends Controller
{
    /**
     * @param KecamatanRepository $kecamatan
     * @return mixed
     */
    public function getList(KecamatanRepository $kecamatan)
    {
        return $kecamatan->getList();
    }
}
