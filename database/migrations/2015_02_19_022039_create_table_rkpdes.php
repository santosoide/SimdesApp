<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRkpdes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rkpdes', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->string('program_rpjmdes_id');
            $table->integer('kegiatan_id');
            $table->integer('program_id');
            $table->string('pejabat_desa_id');
            $table->string('dana_desa_id');
            $table->string('tahun');
            $table->string('kegiatan');
            $table->integer('sifat');
            $table->string('lokasi');
            $table->double('anggaran');
            $table->boolean('is_finish')->default(0);
            $table->timestamps();
            $table->index(['_id']);
            $table->foreign('program_rpjmdes_id')->references('_id')->on('rpjmdes_program');
            $table->foreign('program_id')->references('_id')->on('program');
            $table->foreign('pejabat_desa_id')->references('_id')->on('pejabat_desa');
            $table->foreign('dana_desa_id')->references('_id')->on('dana_desa');
            $table->foreign('user_id')->references('_id')->on('users');
            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
            # full text kegiatan, pagu_anggaran status
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('rkpdes');
    }

}
