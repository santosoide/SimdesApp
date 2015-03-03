<?php

use Illuminate\Database\Migrations\Migration;

class CreateTableSumberDana extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sumber_dana', function ($table) {
            $table->engine = 'MyISAM';

            $table->increments('_id');
            $table->string('sumber_dana');

            // Code behind
            $table->string('user_creator')->nullable()->default(null);
            $table->string('user_updater')->nullable()->default(null);
            $table->timestamps();
            $table->index(['_id', 'sumber_dana']);
            $table->softDeletes();
            # full text sumber_dana
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sumber_dana');
    }
}
