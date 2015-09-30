<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\TeamMember;

class CreateTeamMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('team_members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('slug');
			$table->string('title');
			$table->string('email');
			$table->string('linkedin')->nullable();
			$table->text('bio')->nullable();
			$table->integer('priority');
			$table->string('photo')->nullable();
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		TeamMember::create([
				'first_name'	=> 'Alex',
				'last_name'		=> 'Kaneen',
				'slug'			=> 'kaneen-alex',
				'title'			=> 'President &amp CEO',
				'email'			=> 'alex@acclaimeventsllc.com',
				'linkedin'		=> 'pub/alex-kaneen/1/474/b3a',
				'priority'		=> 1,
				'photo'			=> '/images/team/kaneen-alex.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		TeamMember::create([
				'first_name'	=> 'Bob',
				'last_name'		=> 'Fritz',
				'slug'			=> 'fritz-bob',
				'title'			=> 'Senior Vice President',
				'email'			=> 'bob@acclaimeventsllc.com',
				'linkedin'		=> 'in/bobf2003',
				'priority'		=> 2,
				'photo'			=> '/images/team/fritz-bob.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		TeamMember::create([
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Martin',
				'slug'			=> 'martin-jeff',
				'title'			=> 'VP Business Development',
				'email'			=> 'jeffm@acclaimeventsllc.com',
				'linkedin'		=> 'in/spartanmartin',
				'priority'		=> 3,
				'photo'			=> '/images/team/martin-jeff.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('team_members');
	}

}
