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

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
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
