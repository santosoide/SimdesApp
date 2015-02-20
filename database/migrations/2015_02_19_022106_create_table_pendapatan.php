<?php

use Illuminate\Database\Migrations\Migration;

class CreateTablePendapatan extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendapatan', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->string('pendapatan');
            $table->string('tahun');
            $table->integer('kelompok_id');
            $table->integer('jenis_id');
            $table->integer('obyek_id');
            $table->string('kode_rekening');
            $table->string('volume1');
            $table->string('volume2');
            $table->string('volume3');
            $table->string('satuan1');
            $table->string('satuan2');
            $table->string('satuan3');
            $table->double('satuan_harga');
            $table->double('jumlah');
            $table->boolean('is_rka')->default(0);
            $table->boolean('is_dpa')->default(0);
            // 0 = nothing - 1 = request - 2 = finish
            $table->smallInteger('is_finish')->default(0);
            $table->date('finished_at');
            // 0 = nothing - 1 = reject
            $table->smallInteger('is_rejected')->default(0);
            $table->date('rejected_at');
            $table->double('januari')->default(0);
            $table->double('februari')->default(0);
            $table->double('maret')->default(0);
            $table->double('april')->default(0);
            $table->double('mei')->default(0);
            $table->double('juni')->default(0);
            $table->double('juli')->default(0);
            $table->double('agustus')->default(0);
            $table->double('september')->default(0);
            $table->double('oktober')->default(0);
            $table->double('november')->default(0);
            $table->double('desember')->default(0);
            $table->double('realisasi')->default(0);
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);
//            $table->foreign('user_id')->references('_id')->on('users');
//            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
            # full text pendapatan, jumlah
            # no ajax list
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pendapatan');
    }

}
