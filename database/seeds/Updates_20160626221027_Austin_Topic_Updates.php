<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Topic;
use App\Models\Option;

class Updates_20160626221027_Austin_Topic_Updates extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$published	= Carbon::now();

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 1)
        	 ->update([
        	 		'title'		=> 'Staffing, Training &amp; Talent Retention',
        	 		'text'		=> '<ul>
	<li>- How to recruit and retrain technical staff (sharing ideas of what works for others and anything new)</li>
	<li>- IT Talent and Training
		<ul>
			<li>Supply and demand of IT talent - how to attract new talent</li>
			<li>The need for more online and virtual IT training</li>
			<li>When to hire and what to look for in a Security Officer</li>
		</ul>
	</li>
	<li>- Talent Retention - Culture and challenges of keeping top talent from leaving</li>
</ul>',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 2)
        	 ->update([
        	 		'title'		=> 'Cyber Security',
        	 		'text'		=> '<ul>
	<li>- BYOD vs Corporate provided devices</li>
	<li>- Multi factor authentication and protecting mobile devices</li>
	<li>- How has web based application changed this paradigm</li>
</ul>',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 3)
        	 ->update([
        	 		'title'		=> 'The Value of IT Solutions (pros &amp; cons of IT products)',
        	 		'text'		=> '<ul>
	<li>- Office 365</li>
	<li>- Flash Storage</li>
	<li>- Cloud vs on premise</li>
</ul>',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 4)
        	 ->update([
        	 		'title'		=> 'Information Security',
        	 		'text'		=> '<ul>
	<li>- Adaptive security architecture to identify and counter evolving threats</li>
	<li>- Email Security - protocol and enforcement of personal email through corporate mail system</li>
	<li>- System ownership - the psychology of getting end users and operators to take ownership of applications</li>
	<li>- End user security awareness training</li>
</ul>',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 5)
        	 ->update([
        	 		'title'		=> 'Internet of Things',
        	 		'text'		=> '- The effect on businesses of devices being added to the corporate network infrastructure',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 6)
        	 ->update([
        	 		'title'		=> 'New Technology Trends',
        	 		'text'		=> '- This session will focus on new technologies that we can expect to see on the horizon',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '=', 7)
        	 ->update([
        	 		'title'		=> 'Business Continuity Disaster Recovery',
        	 		'text'		=> '<ul>
	<li>- Mitigating risk using cloud vs traditional brick and mortar</li>
	<li>- Resiliency - RPO and RTO, what are stated, tested and recoverable Standards</li>
</ul>',
					'published'	=> $published,
        	 	]);

        Topic::where('conference_slug', '=', '2016/austin')
        	 ->where('priority', '>', 7)
        	 ->update([
        	 		'published' => null,
        	 	]);

        Option::where('slug', '=', '2016/austin')
        	  ->where('option', '=', 'show_topics')
        	  ->update([
        	  		'value'		=> 1,
        	  		'published'	=> $published,
        	  	]);
    }
}
