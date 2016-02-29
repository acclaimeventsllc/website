<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partners', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('slug');
            $table->string('company');
            $table->string('website');
            $table->string('slogan')->nullable();
            $table->text('bio')->nullable();
            $table->text('tags')->nullable();
            $table->string('photo')->nullable();
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
        Schema::drop('partners');
    }
}
