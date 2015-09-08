<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\User;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('username');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->rememberToken();
			$table->tinyInteger('permissions')->default(0);
			$table->timestamps();
			$table->timestamp('activated')->nullable();
			$table->softDeletes();
		});

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

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
