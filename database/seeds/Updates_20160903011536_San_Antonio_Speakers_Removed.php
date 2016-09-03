<?php

use Illuminate\Database\Seeder;
use App\Models\Speaker;
use App\Models\Agenda;

class Updates_20160903011536_San_Antonio_Speakers_Removed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	Speaker::where('conference_slug', '=', '2017/san-antonio')
    		   ->update(['agenda_slug' => null, 'published' => null]);

    	Agenda::where('conference_slug', '=', '2017/san-antonio')
    		  ->update(['speakers' => null]);
    }
}
