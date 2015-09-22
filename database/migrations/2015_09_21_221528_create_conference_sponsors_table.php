<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\ConferenceSponsor;
use Carbon\Carbon;

class CreateConferenceSponsorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('conference_sponsors', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('conference_id');
			$table->integer('sponsor_id');
			$table->string('sponsorship');
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 1,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 2,
				'sponsorship'	=> 'Ruby',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 3,
				'sponsorship'	=> 'Diamond',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 4,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 5,
				'sponsorship'	=> 'Ruby',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 6,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 7,
				'sponsorship'	=> 'Diamond',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 8,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 9,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 10,
				'sponsorship'	=> 'Ruby',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 11,
				'sponsorship'	=> 'Diamond',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);

		ConferenceSponsor::create([
				'conference_id' => 1,
				'sponsor_id'	=> 12,
				'sponsorship'	=> 'Gold',
				'published'		=> Carbon::create(2015, 09, 15, 07, 30, 00),
			]);
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('conference_sponsors');
	}
}
