<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // create table users
        Schema::create('users', function ($table) {
            $table->engine = 'MyISAM';

            // generate from model event
            $table->string('_id', 50);

            // [required,unique]
            $table->string('email')->unique();

            // [required]
            $table->string('nama');

            // [required]
            $table->string('password');

            // [required]
            $table->boolean('is_active')->default(1);

            // [required]
            $table->integer('level')->default(1);

            // code behind
            // from session organisasi
            $table->string('organisasi_id', 50);

            // auto generate if log out success
            $table->string('remember_token')->nullable()->default(null);

            // from success register organisasi to help password hint
            $table->string('password_hint')->nullable()->default(null);

            // update profile
            $table->longtext('avatar')->nullable();

            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id', 'nama']);
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
        // drop table users
        Schema::drop('users');
    }
}
