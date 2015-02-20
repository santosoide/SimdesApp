<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableKegiatan extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening');
            $table->integer('program_id');
            $table->string('kegiatan');
            $table->string('organisasi_id')->nullable()->default(null);

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->index(['_id', 'kegiatan']);
            $table->foreign('program_id')->references('_id')->on('program');
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
        Schema::drop('kegiatan');
    }

}
