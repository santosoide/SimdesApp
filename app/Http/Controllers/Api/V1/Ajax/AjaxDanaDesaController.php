<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\DanaDesa\DanaDesaRepository;

class AjaxDanaDesaController extends Controller {

    /**
     * @param DanaDesaRepository $danaDesa
     * @return mixed
     */
    public function getListDanaDesa(DanaDesaRepository $danaDesa)
    {
        return $danaDesa->getListByOrganisasi($this->getOrganisasiId());
    }
}
