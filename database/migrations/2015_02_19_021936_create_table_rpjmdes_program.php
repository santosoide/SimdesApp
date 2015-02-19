<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRpjmdesProgram extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmdes_program', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->string('masalah_id');
            $table->integer('program_id');
            // @todo tambah manual pada database online
            // @todo frontend issue
            // program (string) ditambahkan pada waktu input atau update fungsinya untuk
            // mengurangi pencarian relasi dari table kewenangan program, (string) bisa
            // didapatkan dari frontend yang mengirim string lewat input hidden
            $table->string('program');
            $table->string('pejabat_desa_id');
            // implementasi terbaru sumber_dana_id diganti dengan dana_desa_id
            $table->string('dana_desa_id');
            $table->string('lokasi');
            $table->integer('sifat');
            $table->integer('waktu');
            $table->string('satuan_waktu');
            $table->string('volume1');
            $table->string('satuan1');
            $table->string('volume2');
            $table->string('satuan2');
            $table->string('volume3');
            $table->string('satuan3');
            $table->double('harga_satuan');
            $table->double('pagu_anggaran');
            // @todo : ganti di database production
            // 0 = nothing - 1 = request - 2 = finish
            $table->smallInteger('is_finish')->default(0);
            $table->date('finished_at');
            // 0 = nothing - 1 = reject
            $table->smallInteger('is_rejected')->default(0);
            $table->date('rejected_at');
            // kasih keterangan reject
            $table->text('keterangan_reject')->nullable();
            $table->timestamps();
            $table->index(['_id']);
            $table->foreign('masalah_id')->references('_id')->on('rpjmdes_masalah');
            $table->foreign('program_id')->references('_id')->on('program');
            $table->foreign('pejabat_desa_id')->references('_id')->on('pejabat_desa');
            $table->foreign('dana_desa_id')->references('_id')->on('dana_desa');
            $table->foreign('dana_desa_id')->references('_id')->on('dana_desa');
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
        Schema::drop('rpjmdes_program');
    }

}
