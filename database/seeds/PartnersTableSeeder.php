<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PartnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $_table = 'partners';

    public function run()
    {

    	// DELETING TABLE ENTRIES
        DB::table($this->_table)->delete();


        // CONFERENCE PARTNERS
        DB::table($this->_table)->insert([
            [
                'company'   => 'TAGITM',
                'slug'      => 'tagitm',
                'website'   => 'http://www.tagitm.org',
                'slogan'    => '',
                'tags'		=> '2015/austin',
                'photo'     => '/images/partners/tagitm.png',
                'published' => Carbon::create(2015, 08, 28, 15, 05, 29),
            ],
        ]);

    }
}
