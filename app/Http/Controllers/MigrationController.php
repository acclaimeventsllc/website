<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MigrationController extends Controller
{
	//
	public function migrate() {
		$migrate	= \Artisan::call('migrate');
		dd($migrate);
	}

	public function rollback() {
		$rollback	= \Artisan::call('migrate:rollback');
		dd($rollback);
	}

	public function seed() {
		$seed		= \Artisan::call('db:seed');
		dd($seed);
	}

	public function refresh() {
		$rollback	= \Artisan::call('migrate:rollback');
		$migrate	= \Artisan::call('migrate');
		$seed		= \Artisan::call('db:seed');
		dd($seed);
	}

}
