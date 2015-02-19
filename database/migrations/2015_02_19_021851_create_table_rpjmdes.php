<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRpjmdes extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmdes', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('visi');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->timestamps();
            $table->primary('_id');
            $table->index(['_id']);
            $table->foreign('user_id')->references('_id')->on('users');
            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
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
        Schema::drop('rpjmdes');
    }

}
