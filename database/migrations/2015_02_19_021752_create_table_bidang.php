<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableBidang extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->integer('fungsi_id');
            $table->string('bidang');
            $table->index(['_id', 'bidang']);
            $table->foreign('fungsi_id')->references('_id')->on('fungsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bidang');
    }
}
