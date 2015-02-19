<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiPendapatan extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_pendapatan', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('pendapatan_id');

            // pendapatan ini diambil dari table pendapatan  berupa string
            // berdasarkan pendapatan_id, atau bisa juga ini diinput dari
            // frontend ketika memilih dropdown, maka akan mengisi input
            // hidden 'pendapatan' dengan begitu tanpa perlu adanya
            // relasi dari backend untuk mendapatkan string dari
            $table->string('pendapatan');

            // proses input nomor bukti terdiri dari gabungan misal :
            // 0001.'/'.STS-kode_rekening_pendapatan.'/'.kode_desa.'/'.tahun
            // $nomor_bukti = e($data['no_bukti']) . '/STS-' . $kode_rekening . '/' . $kode_desa . '/' . date('Y');
            $table->string('nomor_bukti');
            $table->string('tanggal');

            // proses input nomor bukti terdiri dari gabungan misal :
            // $no_bku_sts = e($data['no_bukti']) . '/BKT.STS-' . $kode_rekening . '/' . $kode_organisasi . '/' . date('Y');
            $table->string('nomor_bku');

            // @todo add field on server
            $table->string('nomor_bku_sts');
            $table->integer('jumlah');
            $table->string('user_id');
            $table->string('pejabat_desa_id');

            // penerima ini adalah nama pejabat desa, bisa diambil dari frontend dengan mengirimkan nama pejabat desa
            // namun tidak dikeluarkan diinput create form atau edit form, proses inputnya hanya diRepository saja
            $table->string('penerima');
            $table->string('organisasi_id');
            $table->timestamps();
            $table->index(['_id']);
            //            $table->foreign('pendapatan_id')->references('_id')->on('pendapatan');
            //            $table->foreign('pejabat_desa_id')->references('_id')->on('pejabat_desa');
            //            $table->foreign('user_id')->references('_id')->on('users');
            //            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
            # fulltext search : no_bku, pendapatan
            # relation method table : pendapatan, pejabat_desa,users, organisasi
            # relation $with = ['pendapatan'];
            # kode_rekening pendapatan bisa juga minta frontend untuk mengirim inputan kode_rekening hanya untuk keperluan penggabungan untuk nomer_bukti dan no_bku
            # kode_desa bisa didapat dari Controller terkait, pada Controller itu ambil inject dari OrganisasiInterface
            # di OrganisasiInterface dan OrganisasiRepository buat method untuk getKodeDesa($organisasi_id)
            # yang dijadikan required pada validation service = ['pendapatan_id','tanggal','nomor_bukti','jumlah','pejabat_desa_id']
            # pada attributes di service sesuaikan dengan benar untuk menampilkan error validasi, misal pendapatan_id = Pendapatan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_pendapatan');
    }

}
