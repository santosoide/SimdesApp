<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableLokasiProgram extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lokasi_program', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');

            // [required]
            $table->string('rpjmdes_program_id');

            // [required] pelaksana kegiatan
            $table->string('pejabat_desa_id');

            // [required]
            $table->string('lokasi');

            // [required]
            $table->integer('volume1')->nullable()->default(null);

            // [required]
            $table->string('satuan1')->nullable()->default(null);

            // [required] diisikan jumlah
            $table->integer('sasaran_manfaat_laki');

            // [required]
            $table->integer('sasaran_manfaat_wanita');

            // [required] anggota rumah tangga miskin
            $table->integer('sasaran_manfaat_artm');

            // default orang bisa juga KK [required]
            $table->string('sasaran_satuan');

            ### [not required]
            $table->integer('volume2')->nullable()->default(null);
            $table->string('satuan2')->nullable()->default(null);
            $table->integer('volume3')->nullable()->default(null);
            $table->string('satuan3')->nullable()->default(null);
            $table->double('harga_satuan');

            //  anggaran dari hasil kali volume * satuan * harga satuan
            $table->double('anggaran');

            ### proses code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);
            #relation belongsTo
//            $table->foreign('rpjmdes_program_id')->references('_id')->on('rpjmdes_program');
//            $table->foreign('pejabat_desa_id')->references('_id')->on('pejabat_desa');
//            $table->foreign('user_id')->references('_id')->on('users');
//            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
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
        Schema::drop('lokasi_program');
    }
}
