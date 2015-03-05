<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\SumberDana\SumberDanaRepository;

class AjaxSumberDanaController extends Controller
{
    /**
     * @param SumberDanaRepository $sumberDana
     * @return mixed
     */
    public function getList(SumberDanaRepository $sumberDana)
    {
        return $sumberDana->getList();
    }
}
