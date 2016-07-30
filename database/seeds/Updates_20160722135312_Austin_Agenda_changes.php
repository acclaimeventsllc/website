<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Models\Option;
use App\Models\Agenda;

class Updates__20160722135312_Austin_Agenda_changes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// Variables for later use
    	$slug		= '2016/austin';
    	$date		= Carbon::parse('2016-09-21 00:00:00');
    	$published	= Carbon::parse('2016-07-22 13:53:12');


    	// Turn off the topics since we have a fleshed out agenda
    	Option::where('slug', '=', $slug)
    		  ->where('option', '=', 'show_topics')
    		  ->where('value', '=', 1)
    		  ->update(['value' => 0]);


        // Update remaining agenda items

    	// 9:00 Keynote
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHours(9)->format('Y-m-d H:i:s'))
    		  ->update([
    		  		'slug'			=> 'staffing-training-and-talent-retention',
    		  		'session_type'	=> 'keynote',
    		  		'title'			=> 'Keynote: Staffing, Training &amp; Talent Retention',
    		  		'title_short'	=> 'Staffing, Training &amp; Talent Retention',
    		  		'desc'			=> 'Join our opening panel of CIOs as we discuss challenges around staffing, training and how to keep our good talent from leaving.  With new technological advances coming out all the time, we often need people with new types of advanced knowledge and skillsets.  Do we hire and retrain people from within the organization or do we look to the pool of people coming from the universities or other areas?  Join our panel as they discuss what they are doing to recruit and retrain technical staff, where they are finding their IT Talent and some of the things that they are doing to retain their good talent from leaving to find new opportunities.',
    		  	]);

    	// 10:30 Keynote
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHour()->addMinutes(30)->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'asc')
    		  ->take(1)
    		  ->update([
    		  		'slug'			=> 'cyber-security',
    		  		'session_type'	=> 'keynote',
    		  		'title'			=> 'Cyber Security',
    		  		'title_short'	=> 'Cyber Security',
    		  		'desc'			=> 'With cyber threats evolving, IT Leaders are challenged to find more innovative ways to secure and protect information while increasing access to authorized users. Join our discussion as we talk about some of the security challenges and risks that comes with each. Discussion points will include: Personal vs. Corporate mobile devices and how to protect them, Multi factor authentication, the paradigm of web based applications, access to cloud networks and interactive real time infrastructures.',
    		  	]);

    	// Disable the second 10:30 breakout
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'desc')
    		  ->take(1)
    		  ->update(['published' => null]);

   		// 11:45 Breakouts
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHour()->addMinutes(15)->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'asc')
    		  ->take(1)
    		  ->update([
    		  		'slug'			=> 'business-continuity-disaster-recovery',
    		  		'session_type'	=> 'breakout',
    		  		'title'			=> 'Business Continuity Disaster Recovery',
    		  		'title_short'	=> 'Business Continuity Disaster Recovery',
    		  		'desc'			=> 'Having an established business continuity and disaster recovery plan can help an organization to continue business and mitigate losses during catastrophic failures, cyber-attacks and malware infections, natural disasters and other critical emergencies. Join our group of experts as they discuss some of the strategies and protocols which have been implemented to help protect their companies in the event that an emergency strikes.',
    		  	]);

    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'desc')
    		  ->take(1)
    		  ->update([
    		  		'slug'			=> 'new-technology-trends',
    		  		'session_type'	=> 'session',
    		  		'title'			=> 'New Technology Trends',
    		  		'title_short'	=> 'New Technology Trends',
    		  		'desc'			=> 'What is on the Horizon?',
    		  	]);

   		// 12:45 Keynote
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHour()->format('Y-m-d H:i:s'))
    		  ->update([
    		  		'slug'			=> 'the-internet-of-things',
    		  		'session_type'	=> 'keynote',
    		  		'title'			=> 'The Internet of Things',
    		  		'title_short'	=> 'The Internet of Things',
    		  		'desc'			=> 'As Technology advances, so has the capability to simultaneously connect devices, buildings, vehicles, networks, electronics, power grids, software, sensors and much more, giving us the ability to share, collect and use data in real time. Where the Internet of Things can provide convenience and benefits to the organization, it can also cause an IT organization many challenges. Join our panel of experts as they discuss how they are using IOT along with some of the significant challenges and benefits in moving to this type of technology.',
    		  	]);

   		// 2:30 Breakouts
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHour()->addMinutes(45)->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'asc')
    		  ->take(1)
    		  ->update([
    		  		'slug'			=> 'it-alignment-keeping-ahead-of-change',
    		  		'session_type'	=> 'breakout',
    		  		'title'			=> 'IT Alignment - Keeping ahead of change',
    		  		'title_short'	=> 'IT Alignment',
    		  		'desc'			=> 'One of the most challenging tasks of the CIO is to ensure that the IT department is supporting and embracing the needs of the business.  With technology advancing rapidly, companies are being forced to change and adapt quickly in order to stay competitive within the industry.  How we handle these changes can have a deep impact on the bottom line for the organization.  Join our panel of experts as they discuss some of the things that they are doing to keep up with the demand for new technologies while embracing and supporting the needs of the business.',
    		  	]);

    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->format('Y-m-d H:i:s'))
    		  ->orderBy('priority', 'desc')
    		  ->take(1)
    		  ->update([
    		  		'slug'			=> 'information-security',
    		  		'session_type'	=> 'session',
    		  		'title'			=> 'Information Security',
    		  		'title_short'	=> 'Information Security',
    		  		'desc'			=> 'Companies are collecting enormous amounts of real time information and data from customers, devices and employees.  There are many things that we can do to ensure that the information collected is protected and secure.  Join our panel as we discuss some of the challenges around:<ul><li>Adaptive Security Architectures – How they are used to identify and counter evolving threats</li><li>Email Security - protocol and enforcement of personal email through corporate mail systems</li><li>System ownership - ways to get end users and operators to take ownership of applications</li><li>End user security awareness training</li></ul>',
    		  	]);

   		// 3:45 Keynote
    	Agenda::where('conference_slug', '=', $slug)
    		  ->where('timeslot', '=', $date->addHour()->addMinutes(15)->format('Y-m-d H:i:s'))
    		  ->update([
    		  		'slug'			=> 'the-value-of-it-solutions',
    		  		'session_type'	=> 'keynote',
    		  		'title'			=> 'The Value of IT Solutions',
    		  		'title_short'	=> 'The Value of IT Solutions',
    		  		'desc'			=> 'CIOs are continually asked to spend less and do more while supporting the needs of the organization.  In this session we will have an open dialogue on value of many IT solutions that companies use.  With newer and better technologies, software and upgrades always around the corner, looking at all of our options can save us a lot of time and money.  Join our panel of experts as they address pros and cons of subscription based vs. fully licensed products such as Office 365, flash storage vs. traditional storage and Cloud vs. private cloud or on premise solutions and the value of doing a short and long term cost benefit analysis before making a final decision.',
    		  	]);
    }
}

