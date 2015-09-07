<?php

use Illuminate\Database\Seeder;
use App\Models\TeamMember;
use Carbon\Carbon;

class TeamMembersTableSeeder extends Seeder {
	
	public function run() {

		DB::table('team_members')->delete();

		/*
			Schema::create('team_members', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('first_name');
				$table->string('last_name');
				$table->string('slug');
				$table->string('title');
				$table->string('email');
				$table->text('bio')->nullable();
				$table->integer('priority');
				$table->string('photo')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'first_name',
				'last_name',
				'slug',
				'title',
				'email',
				'bio',
				'priority',
				'photo',
				'published',
			];

		*/

		TeamMember::create([
				'first_name'	=> 'Alex',
				'last_name'		=> 'Kaneen',
				'slug'			=> 'kaneen-alex',
				'title'			=> 'President &amp CEO',
				'email'			=> 'alex@acclaimeventsllc.com',
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
				'priority'		=> 3,
				'photo'			=> '/images/team/martin-jeff.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


	}

}