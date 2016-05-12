<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Sponsor;

class AlterSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ADDING CONFERENCE SLUG COLUMN
        Schema::table('sponsors', function (Blueprint $table) {
            $table->string('conference_slug')->after('slug')->nullable();
            $table->enum('sponsorship', ['Diamond', 'Ruby', 'Emerald'])->after('conference_slug')->default('Emerald');
        });


        // AUTO-FILL CONFERENCE SLUG
        // probably should do this as a seeder, but I wanted to make sure it
        // is done at the same time as the migration.
        $sponsors = Sponsor::whereNull('conference_slug')->whereNotNull('tags')->get();

        foreach ($sponsors as $sponsor)
        {
            $sponsor->conference_slug = $sponsor->tags;
            $sponsor->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DROPPING CONFERENCE SLUG COLUMN
        Schema::table('sponsors', function (Blueprint $table) {
            $table->dropColumn('conference_slug');
        });
    }
}
