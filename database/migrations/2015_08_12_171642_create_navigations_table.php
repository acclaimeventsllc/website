<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigations', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('menu');
            $table->string('styles');
            $table->string('href');
            $table->string('content');
            $table->string('title')->nullable();
            $table->text('option')->nullable();
            $table->integer('priority')->default(0);
            $table->timestamps();
            $table->timestamp('published')->nullable();
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
        Schema::drop('navigations');
    }
}
