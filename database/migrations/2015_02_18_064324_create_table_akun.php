<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableAkun extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akun', function ($table) {
            $table->engine = 'InnoDB';

            $table->increments('_id');

            // [required,unique]
            $table->string('kode_rekening')->unique();

            // [required]
            $table->string('akun');

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->index(['_id', 'akun']);
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
        Schema::drop('akun');
    }
}
