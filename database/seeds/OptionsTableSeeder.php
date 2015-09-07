<?php

use Illuminate\Database\Seeder;
use App\Models\Option;
use App\Helpers\Helpers;
use Carbon\Carbon;

class OptionsTableSeeder extends Seeder {
    
    public function run() {

        DB::table('options')->delete();

        /*
            Schema::create('options', function(Blueprint $table)
            {
                $table->increments('id');
                $table->string('option');
                $table->text('value');
                $table->tinyInteger('serialized')->default(0);
                $table->timestamps();
                $table->timestamp('published')->default('0000-00-00 00:00:00');
                $table->softDeletes();
            });

            protected $fillable = [
                'option',
                'value',
                'serialized',
                'published',
            ];
        */

        Option::create([
                'option'    => 'maintenance',
                'value'     => '0',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'hero',
                'value'     => '0',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'active',
                'value'     => 'home',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'title',
                'value'     => 'Acclaim Events',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Option::create([
                'option'    => 'jumbotron',
                'value'     => '/images/networking.jpg',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

    }

}