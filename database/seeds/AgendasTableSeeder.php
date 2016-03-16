<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AgendasTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */

	protected $_table = 'agendas';

	public function run()
	{

		// INITIAL PUBLISH DATE
		$published = Carbon::create(2015, 08, 28, 15, 05, 29);

		// DELETING TABLE ENTRIES
		DB::table($this->_table)->delete();


		// AUSTIN 2015


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Analyzing Big Data – Using the Massive Volume of Information Collected',
				'title_short'		=> 'Analyzing Big Data',
				'desc'				=> '<p>Many organizations now have the ability to collect a massive amounts of structured and unstructured data every day. If companies are able to analyze and extract value from the information it can provide great insights and information about business trends. Join our experts as they discuss Big Data, some of its uses and some of the challenges around analysis, capture, curation, storage and privacy/security of the information collected.</p>',
				'speakers'			=> 'moderator|sturm-mike,panelist|bhattacharjee-dave,panelist|ketchum-debra,panelist|talbert-neera',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Enterprise Mobility – Embracing BYOD While Keeping your Information Secure',
				'title_short'		=> 'Enterprise Mobility',
				'desc'				=> '<p>Today’s workforce has an expectation that they will be able to access information through a multitude of various devices, applications and infrastructures. We as IT Leaders need to be able to have policies in place that will accommodate the mobile workforce while maintaining information security. Join our experts as they discuss various strategies, policies and best practices that they have implemented to deal with the ever increasing number of mobile users within their organization.</p>',
				'speakers'			=> 'speaker:brewer-bob',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Application Modernization',
				'title_short'		=> 'Application Modernization',
				'desc'				=> '<p>As technology advances, we are forced to upgrade our old legacy systems to more modern and efficient systems.  Many of the businesses critical operations are often housed within older legacy systems and are completely developed with custom code.  Application Modernization allows the business to extend the life of their current system by incrementally updating applications and systems, allowing them to work together while avoiding costly downtime that would affect business operations.  Join our panel as they discuss some of the challenges strategies and lessons learned as a result of updating to newer more modern systems.</p>',
				'speakers'			=> 'moderator|selissen-anh,panelist|cook-dana,panelist|waldo-jay,panelist|rios-george',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'U.S. Secret Service vs. Cyber Criminals',
				'title_short'		=> 'U.S. Secret Service',
				'desc'				=> '<p>The U.S. Secret Service was established in 1865 to protect our nation\'s currency from counterfeiters. Today, the agency\'s investigative mission has evolved to combat cyber crime targeting U.S. banking infrastructure - specifically financial institutions and payment systems.  This briefing will provide an overview of the capabilities and efforts of the public/private/academic partnerships forged at the U.S. Secret Service Electronic Crimes Task Forces throughout the world.   As well as, current trends in cyber crime, related intelligence sharing, and examples of previous cyber case work by the agency.</p>',
				'speakers'			=> 'speaker:edwards-tom',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Business Continuity Disaster Recovery',
				'title_short'		=> 'Business Continuity Disaster Recovery',
				'desc'				=> '<p>Having an established business continuity and disaster recovery plan can help an organization to continue business and mitigate losses during catastrophic failures, cyber-attacks and malware infections, natural disasters and other critical emergencies. Join our panel of experts as they discuss some of the strategies and protocols that they have implemented within their organizations to help protect their companies in the event that an emergency strikes.</p>',
				'speakers'			=> 'moderator|harris-richard,panelist|fernandes-andrew,panelist|felps-robert,panelist|theis-brandon',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Innovative Strategic Planning – Aligning IT Strategy to the Needs of the Business',
				'title_short'		=> 'Innovative Strategic Planning',
				'desc'				=> '<p>Integrating IT initiatives with the business strategy can often be challenging and complex. The speed of business and access to countless software applications and more connected networks make keeping company information secure a major challenge. IT continues to be under pressure to drive productivity and enable innovation, in many cases with fewer dollars.</p>
					<p>Join our experts as they discuss some innovative ways to help integrate your IT strategy to meet the needs of the business while maintaining a high level of security.</p>',
				'speakers'			=> 'moderator|martin-jeff,panelist|smedley-jeff,panelist|flay-gregory,panelist|johnson-rani,panelist|parnell-lawanda',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'breakout',
				'title'				=> 'Conquering your “Cloud” Fears - Visibility, Performance and End User Experience',
				'title_short'		=> 'Conquering your “Cloud” Fears',
				'desc'				=> '<p>Are you prepared to move your critical applications to the cloud?  With application complexity, visibility concerns and user demand growing at an astounding rate over the past few years,  IT organizations have a lot of times struggled to keep pace.  The cloud can provide many positives, but it also keeps a lot of executives up at night wondering what new complexities and challenges the cloud might be hiding.  Organizations that are the most successful with moving applications to the cloud understand the importance of maintaining application visibility, increase performance and keeping their end user’s happy.  This session will discuss the importance of these key areas and how to put them into affect.</p>',
				'speakers'			=> 'speaker:jackson-kevin',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Information Security – Is your Business Under Attack?',
				'title_short'		=> 'Information Security',
				'desc'				=> '<p>Information Security is one of the biggest things that can keep a CIO up at night. We are always looking for ways to better protect company information and assets while trying to prevent data breaches, hacks and insider threats. Our experts will address risk assessment, governance, and other best practice strategies that can be used to minimize putting your organizations information at risk.</p>',
				'speakers'			=> 'moderator|moore-larry,panelist|botts-michael,panelist|nather-wendy,panelist|yoder-marc',
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2015/austin',
				'timeslot'			=> '2015-09-15 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'The CIO Perspective – A High Level Discussion with Local CIOs',
				'title_short'		=> 'The CIO Perspective',
				'desc'				=> '<p>Join our closing keynote panel of local CIOs as they discuss challenges that they have faced within their organizations and some of the solutions, policies and strategies that have been put in place to help embrace organizational growth and efficiency.</p>',
				'speakers'			=> 'moderator|dominguez-jake,panelist|brandt-scott,panelist|bowers-evan,panelist|bynum-andy',
				'published'			=> $published,
			],
		]);


		// SAN ANTONIO 2016


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'IT Alignment – Keeping Ahead Of Change',
				'title_short'		=> 'IT Alignment',
				'desc'				=> 'Aligning IT with the needs of the business is a necessary component for every organization.  Once aligned, the question then becomes “How can we stay ahead of change when the very nature and the way that we do business is continually changing?” How we adapt to change can have a deep impact on the bottom line of the organization.  Join our panel of CIOs as they discuss some of the things that they are doing to keep up with the demand for new technologies while aligning with the needs of the business.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Controlling IT Spending',
				'title_short'		=> 'Controlling IT Spending',
				'desc'				=> 'CIOs are continually asked to spend less and do more while adding in new technologies, increasing efficiency, productivity and maintaining security for the organization.  There are many innovative things that CIOs can do to cut costs while embracing the organizations business goals.  Join our panel as they discuss some of the things that they have done to cut costs while enhancing the organization as a whole.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Big Data Analytics - Where We Go From Here',
				'title_short'		=> 'Big Data Analytics',
				'desc'				=> 'The Big Data landscape is continually changing and maturing as companies build infrastructures that allow them to collect, process and use data in real time. With more applications, platforms and technologies available; companies are able to do much more with the information that they collect.  Come join our interactive discussion on Big Data as we dive into some of the challenges still being faced and where they see the technology going from here.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Accelerating IT Deployments While Not Compromising Information Security',
				'title_short'		=> 'Accelerating IT Deployments',
				'desc'				=> 'With external cyber threats evolving and as we add more and more layers to our IT Framework such as IOT, Big Data, Cloud Networks, and interactive real time infrastructures; IT Leaders are challenged more now than ever to find ways that will not delay the business processes with information security challenges.  Join our panel as we discuss things that you can do to accelerate the process while not compromising your information security.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout Session TBA',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'The Internet Of Things',
				'title_short'		=> 'The Internet of Things',
				'desc'				=> 'As Technology advances, we now have the capability to simultaneously connect devices, buildings, vehicles, networks, electronics, power grids, software, sensors and much more, giving us the ability to share, collect and use data in real time.  Where the Internet of Things can provide convenience and benefits to the organization, it can also cause an IT organization many challenges.  Join our experts as they discuss how they are using IOT and what some of the significant challenges and benefits have been in moving to this type of technology.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'The Next Generation Of Cloud Computing',
				'title_short'		=> 'Next Generation of Cloud',
				'desc'				=> 'We have seen many changes to the traditional cloud computing model over time.  As cloud providers are able to offer more services that satisfy regulatory and compliance requirements many more options have become available saving CIOs money and enhancing the overall productivity of their organizations.  Join our experts as they discuss some of the different options available such as Hyper-Convergence, Hybrid Clouds, Federated Clouds, Cloud Native Applications and more.  They will also discuss their cloud adoption strategies, advancements and where they see this type of technology it going over the next couple years.',
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout Session TBA',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/san-antonio',
				'timeslot'			=> '2016-05-24 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Finding Your Next IT Talent',
				'title_short'		=> 'Finding Your Next IT Talent',
				'desc'				=> 'When CIOs are looking to achieve their objectives, they often ask “Where am I going to find the person with the right skillset and talent to fill this position?” With technology constantly advancing, new skillsets are often required.  Do we hire from within? Do we hire from outside IT or look to the pool of people coming from one of the universities?  Join our panel of CIOs as they discuss their insights into how they are finding their up and coming IT Talent.',
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);


		// AUSTIN 2016


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2016/austin',
				'timeslot'			=> '2016-09-21 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);


		// TAMPA 2017


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/tampa',
				'timeslot'			=> '2017-02-21 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);


		// SAN ANTONIO 2017


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/san-antonio',
				'timeslot'			=> '2017-05-21 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);


		// AUSTIN 2017


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2017/austin',
				'timeslot'			=> '2017-09-21 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);


		// TAMPA 2018


		DB::table($this->_table)->insert([
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 07:30:00',
				'priority'			=> 1,
				'session_type'		=> 'break',
				'title'				=> 'Networking Breakfast',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 09:00:00',
				'priority'			=> 2,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 10:00:00',
				'priority'			=> 3,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 10:30:00',
				'priority'			=> 4,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 10:30:00',
				'priority'			=> 5,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 11:30:00',
				'priority'			=> 6,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 11:45:00',
				'priority'			=> 7,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 11:45:00',
				'priority'			=> 8,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 12:45:00',
				'priority'			=> 9,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 14:15:00',
				'priority'			=> 10,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 14:30:00',
				'priority'			=> 11,
				'session_type'		=> 'session',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 14:30:00',
				'priority'			=> 12,
				'session_type'		=> 'breakout',
				'title'				=> 'Breakout',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 15:30:00',
				'priority'			=> 13,
				'session_type'		=> 'break',
				'title'				=> 'Networking Break',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
			[
				'conference_slug'	=> '2018/tampa',
				'timeslot'			=> '2018-02-21 15:45:00',
				'priority'			=> 14,
				'session_type'		=> 'keynote',
				'title'				=> 'Keynote',
				'title_short'		=> null,
				'desc'				=> null,
				'speakers'			=> null,
				'published'			=> $published,
			],
		]);

	}
}