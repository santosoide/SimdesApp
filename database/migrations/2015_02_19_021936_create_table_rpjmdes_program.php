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

            // dropdown ['required']
            $table->integer('kegiatan_id')->nullable()->default(1);

            // dropdown ['required']
            // 1 swakelola
            // 2 kerja sama antar desa
            // 3 kerjasama pihak 3
            $table->integer('pelaksanaan')->nullable()->default(1);

            // dropdown ['required']
            $table->integer('sumber_dana_id');

            ### input proses ['not required']
            // hasil dari akumulasi disetiap lokasi tidak ditampilkan
            $table->double('pagu_anggaran')->nullable()->default(0);
            // tahun anggaran dibuat modal seperti pelaksanaan penganggaran
            // sesudah dapat pagu anggaran dibagi otomatis atau manual
            $table->double('tahun_1')->nullable()->default(0);
            $table->double('tahun_2')->nullable()->default(0);
            $table->double('tahun_3')->nullable()->default(0);
            $table->double('tahun_4')->nullable()->default(0);
            $table->double('tahun_5')->nullable()->default(0);
            $table->double('tahun_6')->nullable()->default(0);

            // Tweak for Backoffice functionality
            // 0 = nothing | 1 = proses | 2 = revisi | 3 = finish | 4 = batal verifikasi/hapus
            // keterangan:
            // 0 = tombol tambah, pelaksanaan, detil, proses, edit dan hapus tampil
            // 1 = tombol tambah, pelaksanaan, detil tampil
            // 2 = tombol pelaksanaan, detil, edit tampil
            // 3 = tombol pelaksanaan, detil tampil tapi readonly
            // 4 = tombol hapus tampil
            $table->smallInteger('is_finish')->default(0);

            // keterangan revisi, diinput ketika is_finish = 2
            $table->string('keterangan_revisi')->nullable();
            $table->string('keterangan_reject')->nullable();
            $table->date('finished_at')->nullable();

            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);

//            $table->foreign('kegiatan_id')->references('_id')->on('kegiatan');
//            $table->foreign('sumber_dana_id')->references('_id')->on('sumber_dana');
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
        Schema::drop('rpjmdes_program');
    }

}
