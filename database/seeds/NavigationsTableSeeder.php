<?php

use Illuminate\Database\Seeder;
use App\Models\Navigation;
use Carbon\Carbon;

class NavigationsTableSeeder extends Seeder {
    
    public function run() {

        DB::table('navigations')->delete();

        /*
            Schema::create('navigations', function (Blueprint $table)
            {
                $table->increments('id');
                $table->string('menu');
                $table->string('content');
                $table->string('href');
                $table->string('title')->nullable();
                $table->integer('option')->nullable();
                $table->integer('priority')->default(0);
                $table->timestamps();
                $table->timestamp('published')->default('0000-00-00 00:00:00');
                $table->softDeletes();
            });

        	protected $fillable = [
        		'menu',
                'class',
                'href',
        		'content',
        		'title',
        		'option',
        		'priority',
        		'published',
        	];
        */

        /*****  MAIN MENU  *****/

        Navigation::create([
                'menu'      => 'main',
                'href'      => '/',
                'content'   => 'Home',
                'title'     => 'Acclaim Events Home',
                'option'    => '',
                'priority'  => '1',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'main',
                'href'      => '/about',
                'content'   => 'About Us',
                'option'    => '',
                'priority'  => '2',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'main',
                'href'      => '/conferences',
                'content'   => 'Conferences',
                'option'    => '',
                'priority'  => '3',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'main',
                'href'      => '/contact',
                'content'   => 'Contact Us',
                'option'    => '',
                'priority'  => '4',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'main',
                'class'     => 'register-now',
                'href'      => '/register',
                'content'   => 'Register',
                'option'    => '',
                'priority'  => '5',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        /*****  HOME SUBMENU  *****/

        Navigation::create([
                'menu'      => 'home',
                'href'      => '#home',
                'content'   => 'Top',
                'option'    => '',
                'priority'  => '1',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'home',
                'href'      => '#upcoming-events',
                'content'   => 'Upcoming Events',
                'option'    => '',
                'priority'  => '2',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'home',
                'href'      => '#benefits',
                'content'   => 'Who Should Attend',
                'option'    => '',
                'priority'  => '3',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        Navigation::create([
                'menu'      => 'home',
                'href'      => '#testimonials',
                'content'   => 'Testimonials',
                'option'    => '',
                'priority'  => '4',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        /*****  ABOUT SUBMENU  *****/

        Navigation::create([
                'menu'      => 'about',
                'href'      => '#about',
                'content'   => 'About Acclaim',
                'option'    => '',
                'priority'  => '1',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        Navigation::create([
                'menu'      => 'about',
                'href'      => '#team',
                'content'   => 'Meet Our Team',
                'option'    => '',
                'priority'  => '2',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        Navigation::create([
                'menu'      => 'about',
                'href'      => '#advisors',
                'content'   => 'Advisory Board',
                'option'    => '',
                'priority'  => '3',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


        /*****  CONFERENCE SUBMENU  *****/

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#home',
                'content'   => 'Top',
                'option'    => '',
                'priority'  => '1',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#countdown',
                'content'   => 'Countdown',
                'option'    => 'options:countdown=true',
                'priority'  => '2',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#agenda',
                'content'   => 'Agenda',
                'option'    => 'options:agenda=true',
                'priority'  => '3',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#speakers',
                'content'   => 'Speakers',
                'option'    => 'options:speakers=true',
                'priority'  => '4',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#sponsors',
                'content'   => 'Sponsors',
                'option'    => 'options:sponsors=true',
                'priority'  => '5',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);

        Navigation::create([
                'menu'      => 'conference',
                'href'      => '#location',
                'content'   => 'Venue',
                'option'    => 'options:venue=true',
                'priority'  => '5',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ]);


    }

}