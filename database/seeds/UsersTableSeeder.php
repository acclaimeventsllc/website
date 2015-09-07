<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder {
	
	public function run() {

		DB::table('users')->delete();

		/*

			Schema::create('users', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('username');
				$table->string('email')->unique();
				$table->string('password', 60);
				$table->rememberToken();
				$table->tinyInteger('permissions')->default(0);
				$table->timestamps();
				$table->timestamp('activated')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});


			protected $fillable = [
				'name',
				'email',
				'password',
			];

		*/

		User::create([
				'username' => 'AlexKaneen',
				'email' => 'alex@acclaimeventsllc.com',
				'password' => Hash::make('Nikitta007'),
			]);

		User::create([
				'username' => 'JeffMartin',
				'email' => 'jeffm@acclaimeventsllc.com',
				'password' => Hash::make('Michelle001'),
			]);

		User::create([
				'username' => 'BobFritz',
				'email' => 'bob@acclaimeventsllc.com',
				'password' => Hash::make('badpassword'),
			]);

	}

}