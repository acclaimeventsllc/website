<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Partner;

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
            $table->text('options')->nullable();
            $table->text('contacts')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
            $table->timestamp('published')->nullable();
            $table->softDeletes();
        });

        Partner::create([
                'company'   => 'TAGITM',
                'slug'      => 'tagitm',
                'website'   => 'http://www.tagitm.org',
                'slogan'    => '',
                'photo'     => '/images/partners/tagitm.png',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

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
