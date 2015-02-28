<?php namespace SimdesApp\Http\Controllers\Api\V1\Ajax;

use SimdesApp\Http\Requests;
use SimdesApp\Http\Controllers\Controller;
use SimdesApp\Repositories\Belanja\BelanjaRepository;
use SimdesApp\Repositories\Pembiayaan\PembiayaanRepository;
use SimdesApp\Repositories\Pendapatan\PendapatanRepository;
//use SimdesApp\Repositories\RKPDES\RkpdesRepository;
use SimdesApp\Repositories\Program\ProgramRepository;

class AjaxDashboardController extends Controller {

//    protected $program;
//
//    protected $pendapatan;
//
//    protected $belanja;
//
//    protected $pembiayaan;
//
//    protected $transaksi_belanja;
//
//    protected $transaksi_pendapatan;
//
//    protected $rkpdes;
//
//    public function __construct(
//        ProgramRepository $program,
//        PendapatanRepository $pendapatan,
//        BelanjaRepository $belanja,
//        PembiayaanRepository $pembiayaan
//    )
//    {
//        $this->program = $program;
//        $this->pendapatan = $pendapatan;
//        $this->belanja = $belanja;
//        $this->pembiayaan = $pembiayaan;
//
////      $this->transaksi_belanja = $transaksi_belanja;
////      $this->transaksi_pendapatan = $transaksi_pendapatan;
////      $this->rkpdes = $rkpdes;
//    }
//

/*
 * Masih error mulai getCountDpa kebawah
 * function sudah tidak bisa menampilkan hasil,
 * meskipun data return cuma diisi string biasa
 * */

    public function getJumlah(ProgramRepository $program, PendapatanRepository $pendapatan , BelanjaRepository $belanja, PembiayaanRepository $pembiayaan){
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
}
