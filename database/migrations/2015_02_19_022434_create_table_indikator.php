<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableIndikator extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indikator', function ($table) {
            $table->engine = 'InnoDB';
            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->string('rpjmdes_program_id');
            $table->string('tolok_ukur');
            // Sasaran, Masukan, Keluaran, Hasil
            $table->integer('indikator');
            $table->string('sasaran');
            $table->string('satuan');
            $table->string('target');
            $table->timestamps();
            $table->index(['_id']);
            $table->primary('_id');
            $table->softDeletes();
            # relation with table rpjmdes_program
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('indikator');
    }

}
