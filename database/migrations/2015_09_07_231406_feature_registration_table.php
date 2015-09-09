<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Navigation;

class FeatureRegistrationTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('navigations', function($t)
		{
			$t->renameColumn('class', 'styles');
		});

		Navigation::where('href', '=', '/contact')->where('styles', '=', 'register-now')->update(['styles' => '']);
		Navigation::where('href', '=', '/register')->unpublished()->update(['published' => Carbon::now()]);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Navigation::where('href', '=', '/register')->unpublished()->update(['published' => null]);
		Navigation::where('href', '=', '/contact')->where('styles', '=', 'register-now')->update(['styles' => 'register-now']);

		Schema::table('navigations', function($t)
		{
			$t->renameColumn('styles', 'class');
		});
	}
}
