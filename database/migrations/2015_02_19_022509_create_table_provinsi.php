<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableProvinsi extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsi', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('_id');
            $table->string('kode_prov');
            $table->string('prov');
            $table->timestamps();
            $table->index(['_id']);
            # fulltext search kode_prov, prov
            # validation required [kode_prov,prov]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('provinsi');
    }
}
