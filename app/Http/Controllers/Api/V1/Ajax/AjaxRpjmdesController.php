<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;

use Illuminate\Http\Request;
use SimdesApp\Repositories\RPJMDES\RpjmdesRepository;
use SimdesApp\Repositories\RPJMDES_Program\RpjmdesProgramRepository;

class AjaxRpjmdesController extends Controller
{
    /**
     * Get list rpjmdes
     *
     * @param RpjmdesRepository $rpjmdes
     * @return mixed
     */
    public function getListByOrganisasi(RpjmdesRepository $rpjmdes)
    {
        return $rpjmdes->getListByOrganisasi($this->getOrganisasiId());
    }
}
