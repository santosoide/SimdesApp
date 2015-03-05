<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Transaksi_Belanja\TransaksiBelanjaRepository;
use SimdesApp\Repositories\Transaksi_Pendapatan\TransaksiPendapatanRepository;

class AjaxTransaksiController extends Controller
{
    /**
     * @param TransaksiPendapatanRepository $pendapatan
     * @return mixed
     */
    public function getListPendapatan(TransaksiPendapatanRepository $pendapatan)
    {
        return $pendapatan->getListPendapatanIsFinish($this->getOrganisasiId());
    }

    /**
     * @param TransaksiBelanjaRepository $belanja
     * @return mixed
     */
    public function getListBelanja(TransaksiBelanjaRepository $belanja)
    {
        return $belanja->getListBelanjaIsFinish($this->getOrganisasiId());
    }
}
