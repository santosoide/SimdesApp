<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Belanja\BelanjaRepository;
use SimdesApp\Repositories\Pembiayaan\PembiayaanRepository;
use SimdesApp\Repositories\Pendapatan\PendapatanRepository;
use SimdesApp\Repositories\Program\ProgramRepository;
use SimdesApp\Repositories\RKPDES\RkpdesRepository;
use SimdesApp\Repositories\RPJMDES_Program\RpjmdesProgramRepository;
use SimdesApp\Repositories\Transaksi_Belanja\TransaksiBelanjaRepository;
use SimdesApp\Repositories\Transaksi_Pendapatan\TransaksiPendapatanRepository;

class AjaxDashboardController extends Controller
{
    /**
     * @param ProgramRepository    $program
     * @param PendapatanRepository $pendapatan
     * @param BelanjaRepository    $belanja
     * @param PembiayaanRepository $pembiayaan
     *
     * @return array
     */
    public function getJumlah
    (
        ProgramRepository $program,
        PendapatanRepository $pendapatan,
        BelanjaRepository $belanja,
        PembiayaanRepository $pembiayaan
    )
    {
        $count_program = $program->getJumlahProgram();
        $count_dpa_pendapatan = $pendapatan->getCountDpa();
        $count_dpa_belanja = $belanja->getCountDpa();
        $count_dpa_pembiayaan = $pembiayaan->getCountDpa();

        return [
            'program'        => $count_program,
            'dpa_pendapatan' => $count_dpa_pendapatan,
            'dpa_belanja'    => $count_dpa_belanja,
            'dpa_pembiayaan' => $count_dpa_pembiayaan,
        ];
    }

    /**
     * Get Jumlah Frontoffice
     *
     * @param RpjmdesProgramRepository      $program
     * @param PendapatanRepository          $pendapatan
     * @param BelanjaRepository             $belanja
     * @param PembiayaanRepository          $pembiayaan
     * @param TransaksiBelanjaRepository    $transaksi_belanja
     * @param TransaksiPendapatanRepository $transaksi_pendapatan
     * @param RkpdesRepository              $rkpdes
     *
     * @return array
     */
    public function getJumlahFrontOffice
    (
        RpjmdesProgramRepository $program,
        PendapatanRepository $pendapatan,
        BelanjaRepository $belanja,
        PembiayaanRepository $pembiayaan,
        TransaksiBelanjaRepository $transaksi_belanja,
        TransaksiPendapatanRepository $transaksi_pendapatan,
        RkpdesRepository $rkpdes)
    {
        $count_program = $program->getCountByDesa($this->getOrganisasiId());
        $count_pendapatan = $pendapatan->getCountByDesa($this->getOrganisasiId());
        $count_belanja = $belanja->getCountByDesa($this->getOrganisasiId());
        $count_pembiayaan = $pembiayaan->getCountByDesa($this->getOrganisasiId());
        $count_transaksi_belanja = $transaksi_belanja->getCountByDesa($this->getOrganisasiId());
        $count_transaksi_pendapatan = $transaksi_pendapatan->getCountByDesa($this->getOrganisasiId());
        $count_rkpdes = $rkpdes->getCountByDesa($this->getOrganisasiId());
        $count_rka_pendapatan = $pendapatan->getCountRkaByDesa($this->getOrganisasiId());
        $count_rka_belanja = $belanja->getCountRkaByDesa($this->getOrganisasiId());
        $count_rka_pembiayaan = $pembiayaan->getCountRkaByDesa($this->getOrganisasiId());
        $count_dpa_pendapatan = $pendapatan->getCountDpaByDesa($this->getOrganisasiId());
        $count_dpa_belanja = $belanja->getCountDpaByDesa($this->getOrganisasiId());
        $count_dpa_pembiayaan = $pembiayaan->getCountDpaByDesa($this->getOrganisasiId());

        return [
            'program'              => $count_program,
            'pendapatan'           => $count_pendapatan,
            'belanja'              => $count_belanja,
            'pembiayaan'           => $count_pembiayaan,
            'transaksi_belanja'    => $count_transaksi_belanja,
            'transaksi_pendapatan' => $count_transaksi_pendapatan,
            'rkpdes'               => $count_rkpdes,
            'rka_pendapatan'       => $count_rka_pendapatan,
            'rka_belanja'          => $count_rka_belanja,
            'rka_pembiayaan'       => $count_rka_pembiayaan,
            'dpa_pendapatan'       => $count_dpa_pendapatan,
            'dpa_belanja'          => $count_dpa_belanja,
            'dpa_pembiayaan'       => $count_dpa_pembiayaan,
        ];
    }
}
