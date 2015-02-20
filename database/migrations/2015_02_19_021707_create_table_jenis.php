<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableJenis extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->integer('kelompok_id');
            $table->string('jenis');
            $table->string('status');

            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);

            // Code behind
            $table->index(['_id', 'jenis']);
            $table->foreign('kelompok_id')->references('_id')->on('kelompok');
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
        Schema::drop('jenis');
    }
}
