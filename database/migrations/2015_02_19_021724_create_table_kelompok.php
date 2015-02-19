<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableKelompok extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->integer('akun_id');
            $table->string('kelompok');
            $table->index(['_id', 'kelompok']);
            $table->foreign('akun_id')->references('_id')->on('akun');
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
        Schema::drop('kelompok');
    }
}
