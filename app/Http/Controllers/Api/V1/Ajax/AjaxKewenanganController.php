<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Bidang\BidangRepository;
use SimdesApp\Repositories\Kegiatan\KegiatanRepository;
use SimdesApp\Repositories\Kewenangan\KewenanganRepository;
use SimdesApp\Repositories\Program\ProgramRepository;

class AjaxKewenanganController extends Controller {

    /**
     * Get Kewenangan list using by ajax Dropdown
     *
     * @param KewenanganRepository $kewenangan
     * @return mixed
     */
    public function getListKewenangan(KewenanganRepository $kewenangan)
    {
        return $kewenangan->getList();
    }

    /**
     * Get kewenangan bidang using by ajax Dropdown
     *
     * @param BidangRepository $bidang
     * @param $kewenangan_id
     * @return mixed
     */
    public function GetListBidang(BidangRepository $bidang, $kewenangan_id)
    {
        return $bidang->getListByKewenangan($kewenangan_id);
    }

    /**
     * Get kewenangan bidang using by ajax Dropdown
     *
     * @param BidangRepository $bidang
     * @return mixed
     */
    public function ListBidang(BidangRepository $bidang)
    {
        return $bidang->getList();
    }

    /**
     * Get kewenangan kegiatan using ajax dropdown
     *
     * @param KegiatanRepository $kegiatan
     * @param $program_id
     * @return mixed
     */
    public function getListKegiatan(KegiatanRepository $kegiatan, $program_id)
    {
        return $kegiatan->getListByProgram($program_id);
    }

    /**
     * Get kewenangan kegiatan using ajax dropdown
     *
     * @param ProgramRepository $program
     * @param $bidang_id
     * @return mixed
     */
    public function getListProgram(ProgramRepository $program, $bidang_id)
    {
        return $program->getListByBidang($bidang_id);
    }

    /**
     * Get kewenangan kegiatan using ajax dropdown
     *
     * @param ProgramRepository $program
     * @param $bidang_id
     * @return mixed
     */
    public function getListProgramDesa(ProgramRepository $program, $bidang_id)
    {
        return $program->getListByBidangOrganisasi($bidang_id, $this->getOrganisasiId());
    }
}
