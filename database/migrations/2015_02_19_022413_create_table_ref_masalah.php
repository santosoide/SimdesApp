<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRefMasalah extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_masalah', function ($table) {
            $table->engine = 'InnoDB';
            $table->increments('_id');
            $table->integer('bidang_id');
            $table->string('masalah');
            $table->string('user_id');
            $table->timestamps();
            $table->index(['_id']);
            $table->foreign('bidang_id')->references('_id')->on('bidang');
            $table->foreign('user_id')->references('_id')->on('users');
            $table->softDeletes();
            # fulltext search masalah
            # relation with table : bidang
            # user_id yang dimaksud nanti akan diambil dari session user level back office,
            # dan disiapkan input user_id pada controller create dan update
            # validation required [bidang_id,masalah,]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ref_masalah');
    }

}
