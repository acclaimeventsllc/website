<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('speakers', function(Blueprint $table)
        {
            $table->string('conference_slug')->after('slug')->nullable();
            $table->string('agenda_slug')->after('conference_slug')->nullable();
            $table->string('speaker_type')->after('agenda_slug')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('speakers', function(Blueprint $table)
        {
            $table->dropColumn('conference_slug');
            $table->dropColumn('agenda_slug');
            $table->dropColumn('speaker_type');
        });
    }
}
