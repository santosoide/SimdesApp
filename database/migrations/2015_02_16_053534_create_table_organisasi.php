<?php
use Illuminate\Database\Migrations\Migration;
class CreateTableOrganisasi extends Migration
{

    public function up()
    {
        // create table organisasi
        Schema::create('organisasi', function ($table) {
            $table->engine = 'MyISAM';
            # auto generate from model event
            $table->string('_id', 50);
            // [required]
            $table->string('nama');
            // [required]
            $table->string('alamat')->nullable()->default(null);
            // [required]
            $table->string('no_telp')->nullable()->default(null);
            $table->string('no_fax')->nullable()->default(null);
            // [required, unique]
            $table->string('email')->unique();
            $table->string('website')->nullable()->default(null);
            // [required]
            $table->string('desa');
            $table->string('kode_desa')->nullable()->default(null);
            // [required]
            $table->integer('kec_id')->nullable()->default(null);
            $table->string('kec');
            $table->string('kode_kec')->nullable()->default(null);
            // [required]
            $table->string('kab');
            // [required]
            $table->string('kode_kab')->nullable()->default(null);
            // [required]
            $table->string('prov');
            $table->integer('kode_prov')->nullable()->default(null);
            // informasi akun
            $table->string('user_id');
            $table->boolean('is_active')->default(1);
            # from code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->index(['_id', 'desa']);
            $table->foreign('user_id')->references('_id')->on('users');
            $table->foreign('kec_id')->references('_id')->on('kecamatan');
            $table->timestamps();
            $table->primary('_id');
            $table->softDeletes();
            # full text [desa,email]
            # relation with [kecamatan]
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //drop table organisasi
        Schema::drop('organisasi');
    }
}
