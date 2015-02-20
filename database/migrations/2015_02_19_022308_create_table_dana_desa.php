<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableDanaDesa extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dana_desa', function ($table) {
            $table->engine = 'InnoDB';

            $table->string('_id');
            $table->string('user_id');
            $table->string('organisasi_id');
            $table->integer('sumber_dana_id');
            // posting 0 backoffice | posting 1 frontoffice
            $table->integer('whois_posting')->default(0);
            $table->double('jumlah')->default(0);
            $table->double('anggaran_terpakai')->default(0);
            $table->double('sisa_anggaran')->default(0);
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id']);
//            $table->foreign('sumber_dana_id')->references('_id')->on('sumber_dana');
//            $table->foreign('user_id')->references('_id')->on('users');
//            $table->foreign('organisasi_id')->references('_id')->on('organisasi');
            $table->primary('_id');
            $table->softDeletes();
            # not fulltext search
            # relation with table : sumber_dana, users, organisasi
            # user_id yang dimaksud nanti akan diambil dari session user level back office
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dana_desa');
    }
}
