<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksiBelanja extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_belanja', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');

            // dari input dropdown
            $table->string('belanja_id');

            // dari input hidden
            $table->string('kode_rekening');

            // dari input hidden
            $table->string('belanja');

            // $nomor_bukti = e($data['no_bukti']) . '/TRSK-' . $kode_rekening . '/' . $kode_organisasi . '/' . date('Y');
            $table->string('nomor_bukti');

            // $no_bku_trsk = e($data['no_bukti']) . '/BKT.TRSK-' . $kode_rekening . '/' . $kode_organisasi . '/' . date('Y');
            $table->string('nomor_bku');

            // @todo add field on server
            $table->string('nomor_bku_sts');
            $table->string('tanggal');
            $table->double('jumlah');
            $table->integer('item');
            $table->double('harga');

            // dari input dorpdown/modal
            $table->integer('standar_satuan_harga_id');

            // dari kode_rekening barang hanya saja diganti nama menjadi kode_barang
            // agar tidak sama dengan kode_rekening yang ada pada belanja
            $table->string('kode_barang');

            // dari pejabat desa, ini didapat daridropdown
            $table->string('pejabat_desa_id');

            // dari pejabat desa, ini didapat dari input hidden berupa string nama dari pejabat desa
            $table->string('penerima');

            // dapat dari session
            $table->string('user_id');
            $table->string('organisasi_id');

            // todo ganti sumber_dana ke dana_desa_id
            $table->string('dana_desa_id');
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);

            $table->timestamps();
            $table->index(['_id']);
            $table->primary('_id');
            $table->softDeletes();
            # fulltext search : nomor_bukti, belanja
            # required belanja_id, nomor_bukti, tanggal, jumlah, item, harga, standar_satuan_harga_id, pejabat_desa_id
            # relation method table : belanja, sumber_dana, pejabat_desa,users, organisasi,standar_satuan_harga
            # relation $with = ['belanja'];
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaksi_belanja');
    }

}
