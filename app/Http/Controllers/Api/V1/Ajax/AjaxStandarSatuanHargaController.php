<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\StandarSatuanHarga\StandarSatuanHargaRepository;

class AjaxStandarSatuanHargaController extends Controller
{
    /**
     * Get list standar satuan harga
     *
     * @param StandarSatuanHargaRepository $standarSatuanHarga
     * @return mixed
     */
    public function getList(StandarSatuanHargaRepository $standarSatuanHarga)
    {
        return $standarSatuanHarga->getList();
    }
}
