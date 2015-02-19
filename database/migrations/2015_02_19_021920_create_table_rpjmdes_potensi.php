<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRpjmdesPotensi extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmdes_potensi', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('masalah_id');
            $table->string('potensi');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->timestamps();
            $table->index(['_id']);
            $table->foreign('masalah_id')->references('_id')->on('rpjmdes_masalah');
            $table->foreign('user_id')->references('_id')->on('users');
            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rpjmdes_potensi');
    }

}
