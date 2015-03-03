<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableObyek extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obyek', function ($table) {
            $table->engine = 'MyISAM';

            $table->increments('_id');
            $table->string('kode_rekening');
            $table->integer('jenis_id');
            $table->string('obyek');
            $table->string('organisasi_id')->nullable()->default(null);

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->index(['_id', 'obyek']);
            $table->foreign('jenis_id')->references('_id')->on('jenis');
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
        Schema::drop('obyek');
    }

}
