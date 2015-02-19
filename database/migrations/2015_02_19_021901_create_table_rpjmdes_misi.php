<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableRpjmdesMisi extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rpjmdes_misi', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('rpjmdes_id');
            $table->string('misi');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->timestamps();
            $table->index(['_id']);
            $table->foreign('rpjmdes_id')->references('_id')->on('rpjmdes');
            $table->foreign('user_id')->references('_id')->on('users');
            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
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
        Schema::drop('rpjmdes_misi');
    }

}
