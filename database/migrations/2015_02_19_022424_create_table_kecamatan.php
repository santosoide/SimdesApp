<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableKecamatan extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('_id');
            $table->string('kode_kec');
            $table->string('kec');
            $table->timestamps();
            $table->index(['_id']);
            # fulltext search kode_kec, kec
            # validation required [kode_kec,kec,]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kecamatan');
    }
}
