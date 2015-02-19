<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableStandarSatuanHarga extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('standar_satuan_harga', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening');
            $table->string('barang');
            $table->string('spesifikasi');
            $table->string('satuan');
            $table->double('harga');
            $table->timestamps();
            $table->index(['_id', 'barang']);
            $table->softDeletes();
            # full text kode_rekening, barang, harga, satuan
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('standar_satuan_harga');
    }

}
