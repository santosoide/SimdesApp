<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableFungsi extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fungsi', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->integer('kewenangan_id');
            $table->string('fungsi');
            $table->index(['_id', 'fungsi']);
            $table->foreign('kewenangan_id')->references('_id')->on('kewenangan');
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
        Schema::drop('fungsi');
    }

}
