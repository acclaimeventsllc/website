<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Sponsor;

class Updates_20160512143040_Austin_Vendor extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        // ADD SPONSOR TO AUSTIN 2016 CONFERENCE
    	Sponsor::insert([
    						'slug'				=> 'centurylink',
    						'conference_slug'	=> '2016/austin',
    						'sponsorship'		=> 'Emerald',
    						'company'			=> 'CenturyLink',
    						'website'			=> 'http://www.centurylink.com/',
    						'bio'				=> '<a href="http://www.centurylink.com/" target="_blank">CenturyLink (NYSE: CTL)</a> is a global communications, hosting, cloud and IT services company enabling millions of customers to transform their businesses and their lives through innovative technology solutions. CenturyLink offers network and data systems management, Big Data analytics and IT consulting, and operates more than 55 data centers in North America, Europe and Asia. Visit <a href="http://www.centurylink.com/" target="_blank">CenturyLink</a> for more information.',
    						'tags'				=> '2016/austin',
    						'photo'				=> '/images/sponsors/centurylink.png',
    						'published'			=> Carbon::now(),
    					]);

    }
}
