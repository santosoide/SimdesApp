<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Organisasi\OrganisasiRepository;

class AjaxOrganisasiController extends Controller
{

    /**
     * Get list desa
     *
     * @param OrganisasiRepository $organisasi
     * @return mixed
     */
    public function getList(OrganisasiRepository $organisasi)
    {
        return $organisasi->getList();
    }

}
