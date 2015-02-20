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
            $table->string('rpjmdes_program_id');
            $table->string('dana_desa_id');
            $table->string('tahun');
            $table->string('lokasi');
            $table->double('anggaran');
            $table->string('kegiatan');
            $table->string('pejabat_desa_id');
            $table->boolean('is_finish')->default(0);
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);
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
