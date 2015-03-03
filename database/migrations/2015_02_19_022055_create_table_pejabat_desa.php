<?php

use Illuminate\Database\Migrations\Migration;

class CreateTablePejabatDesa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pejabat_desa', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');

            $table->string('nama');
            $table->string('jabatan');
            $table->string('organisasi_id');
            $table->string('user_id');
            $table->string('fungsi');
            $table->integer('level'); // untuk mendapatkan level dari pejabat desa

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);
//            $table->foreign('user_id')->references('_id')->on('users');
//            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
            # full text nama
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pejabat_desa');
    }
}
