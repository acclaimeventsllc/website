<?php

use Illuminate\Database\Seeder;
use App\Models\Partner;
use Carbon\Carbon;

class PartnersTableSeeder extends Seeder {
	
	public function run() {

		DB::table('partners')->delete();

		/*

			Schema::create('partners', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('company');
				$table->string('slug');
				$table->string('website');
				$table->string('slogan')->nullable();
				$table->text('bio')->nullable();
				$table->text('tags')->nullable();
				$table->text('options')->nullable();
				$table->text('contacts')->nullable();
				$table->binary('photo')->nullable();
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'company',
				'slug',
				'website',
				'slogan',
				'bio',
				'tags',
				'options',
				'contacts',
				'photo',
				'published',
			];

		*/

		Partner::create([
				'company'	=> 'TAGITM',
				'slug'		=> 'tagitm',
				'website'	=> 'www.tagitm.org',
				'slogan'	=> '',
				'photo'		=> '/images/partners/tagitm.png',
				'published'	=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


	}

}