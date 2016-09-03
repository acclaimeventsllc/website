<?php

use Illuminate\Database\Seeder;
use App\Models\Conference;

class Updates_20160903011536_Austin_Canceled extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Conference::where('slug', '=', '2016/austin')
        		  ->orWhere('slug', '=', '2017/austin')
        		  ->update(['published' => null]);
    }
}
