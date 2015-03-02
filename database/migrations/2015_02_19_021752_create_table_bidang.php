<?php
use Illuminate\Database\Migrations\Migration;
class CreateTableBidang extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang', function ($table) {
            $table->engine = 'MyISAM';
            $table->increments('_id');
            $table->string('kode_rekening')->unique();
            $table->integer('kewenangan_id');
            $table->string('bidang');
            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->index(['_id', 'bidang']);
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
        Schema::drop('bidang');
    }
}
