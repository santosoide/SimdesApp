<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableKewenangan extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kewenangan', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->string('kewenangan');
            $table->index(['_id', 'kewenangan']);
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
        Schema::drop('kewenangan');
    }

}
