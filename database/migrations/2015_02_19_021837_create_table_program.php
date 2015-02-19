<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableProgram extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('program', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening');
            $table->integer('bidang_id');
            $table->string('program');
            $table->string('organisasi_id')->nullable()->default(null);
            $table->index(['_id', 'program']);
            $table->foreign('bidang_id')->references('_id')->on('bidang');
            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
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
        Schema::drop('program');
    }
}
