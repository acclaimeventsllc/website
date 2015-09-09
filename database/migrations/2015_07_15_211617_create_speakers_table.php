<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Speaker;

class CreateSpeakersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('speakers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('first_name');
			$table->string('last_name');
			$table->string('slug');
			$table->string('title');
			$table->string('title_short');
			$table->string('company');
			$table->text('bio')->nullable();
			$table->text('tags')->nullable();
			$table->text('options')->nullable();
			$table->text('contacts')->nullable();
			$table->string('photo')->nullable();
			$table->tinyInteger('advisor')->default(0);
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		/*****  NATIONAL ADVISORY BOARD  *****/
		Speaker::create([
				'first_name'	=> 'JJ',
				'last_name'		=> 'DiGeronimo',
				'slug'			=> 'digeronimo-jj',
				'title'			=> 'President',
				'title_short'	=> 'President',
				'company'		=> 'Tech Savvy Women',
				'bio'			=> '<p>JJ DiGeronimo, the president of Tech Savvy Women, began her career designing datacenter infrastructures for Fortune 500 companies after graduating with a computer information systems degree in 1995.</p><p>Now recognized as a thought-leader for Women in Tech and Girls and STEM, JJ empowers professional women and consults senior executives on strategies to retain and attract Women in Technology.</p><p>JJ is featured in many publications and TV shows including Forbes, Fox Business, ITWorld, Career-Intelligence and Rescue a CEO. She has shared her expertise with Amazon, Ingram Micro, RIT, Sears Holding Company, Clemson University, NASA Glenn, Symantec, VMware, Grace Hooper, KeyBank, and Cisco along with many other organizations.</p><p>Prior to her recent work, JJ had a 20-year career in high tech, advancing into leadership positions within Silicon Valley-based technology companies including VMware and Inktomi.</p><p><a href="http://www.jjdigeronimo.com" title="JJ DiGeronimo\'s website" target="blank">www.jjdigeronimo.com</a></p>',
				'photo'			=> '/images/advisors/digeronimo-jj.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Gilbert',
				'last_name'		=> 'Ray',
				'slug'			=> 'gilbert-ray',
				'title'			=> 'President',
				'title_short'	=> 'President',
				'company'		=> 'SIM, Toronto Chapter &amp; Casual Effects, Inc',
				'bio'			=> '<p>Ray has over 20 years experience in senior leadership positions managing professional and customer services departments in the information systems, energy, and telecommunications sectors.</p><p>He is the current President and a founding member of the Toronto Chapter of the Society for Information Management.</p><p>He is also the President of Causal Effects Inc which offers BI solutions that enhance business results through customized actionable analytics for Enterprise Applications and other information assets.</p><p>During the last 25 years and during his consulting career, Ray provided practical thought leadership on the business value of technology to advance end user insights and accelerate the adoption of new technologies like wireless and mobility.</p><p>As a result of this experience, Ray has been a frequent keynote speaker for hundreds of CIO-IT audiences across North America that sought perspectives on the business and IT impacts of telecommunications trends. He has led dozens of private and public sector briefings and workshops with CIO’s or their leadership teams.</p><p>Ray resides in Toronto and holds a Bachelors and Masters in Engineering Physics and MBA from the University of Toronto. He is a registered engineer and an active member of the Institute of Corporate Directors (ICD) and he is a volunteer with the NFP/SMB Event Committee. He also serves on the board of a regional Community Health Care Agency and has supported higher education trough volunteer work and as a part-time professor in business at Seneca College. In the past, educational activities have included supporting courses at the University of Toronto Rotman School of Management, and participating in advisory groups at Boston University and at the WINMEC Consortium plus the Anderson Business School at UCLA.</p>',
				'photo'			=> '/images/advisors/gilbert-ray.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Sheryl',
				'last_name'		=> 'Gundersen',
				'slug'			=> 'gundersen-sheryl',
				'title'			=> 'Tech Recruiter',
				'title_short'	=> 'Tech Recruiter',
				'company'		=> 'The Millard Group',
				'bio'			=> '<p>Sheryl was recruited to join The Millard Group in 2014 for her experience in technology sales, consulting, engineering, and recruiting. Throughout her 30 year career, Sheryl has worked in the Tech industry for start-ups, emerging growth companies, Venture Partners and Fortune 1000 firms in various customer facing roles. With a passion for both technology and people, she moved into tech recruiting several years ago and has never looked back.</p><p>Previously, Sheryl hired and managed architects and sales professionals for professional services, SaaS / Cloud software firms, and telecoms organizations. As a result, she understands many of the requirements her clients seek in sourcing candidates that meet their occupational needs, technical requirements and business culture. In that capacity, Sheryl has secured Sales Executives, CFOs, CIOs, Consultants, Technical Architects, Application Developers, Development Managers for her clients.</p><p>Today, Sheryl recruits sales professionals for tech startup software clients at The Millard Group. She has won numerous awards during her tenure as a headhunter, sales executive, professional services executive and sales engineer and brings that enthusiasm to the executive recruiting profession.</p><p>Sheryl graduated from Messiah College with a double major in Behavioral Science and Business Administration. She resides near Philadelphia with her husband and son and spends weekends biking, testing out new restaurants and enjoying the water on the Chesapeake Bay.</p>',
				'photo'			=> '/images/advisors/gundersen-sheryl.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Sheleen',
				'last_name'		=> 'Quish',
				'slug'			=> 'quish-sheleen',
				'title'			=> 'President',
				'title_short'	=> 'President',
				'company'		=> 'Sheleen Quish Consulting',
				'bio'			=> '<p>Sheleen Quish is the former SVP of HR and IT for Ameristar Casinos Inc. based in Las Vegas, NV. Her position was eliminated in late 2013 when the company was acquired by Pinnacle Entertainment. She is currently President of Sheleen Quish Consulting and is also active with IT professional organizations sharing her knowledge and experience with IT professionals.</p><p>She became the CIO for Ameristar Casinos, Inc. in January 2007. The primary goal was to transform the IT organization from a business obstacle to a business enabler by upgrading the skill set on the IT team, building effective relationships with business leaders and aligning the projects of the IT team with business initiatives. In 2011, Sheleen assumed additional responsibilities and was named SVP HR&amp; IT. Although this could be considered an odd combination, it has proved to be an advantage to business operations. IT and HR were both service organizations that need to support business objectives and both functions derive value from standardization and brand wide strategies. HR generated more value through technology: online team member training, a team member portal, a new labor management systems and team member scheduling system.</p><p>Prior to joining Ameristar Sheleen had formed a consulting firm, Box 9 Consulting, providing IT leadership in a variety of industries. She had previously served as VP &amp; Global CIO for US Can Company, based in Chicago, Illinois, where she was responsible for the global technology infrastructure, 3 data centers and a wide array of applications to support the $750 million company in 24 locations in 6 countries. Sheleen’s background is unique in the CIO world and she has been a pioneer in business /systems integration management. She had 15 years of Marketing and Operations experience in health care, retail and insurance before venturing into IT management. While driving improvements in the operations of a major health insurance company, Sheleen became fully aware of the power of IT in shaping a company’s performance and growth. At the same time she recognized that IT is often not well aligned with business objectives and she pioneered ways to make that a reality. The results were powerful and became the cornerstone of her career. This integration of business and technology which seemed like obvious path to her was actually not widespread in most companies until years later. In 1993, Sheleen assumed her first position in a pure IT role, as a CIO. Over the last 20 years she has been in a CIO role in multiple industries and has developed a set of IT management principles and strategies that support achieving business goals and creating a viable IT culture for IT professionals to thrive in. Focusing on people, processes and technology Sheleen has consistently lead business improvements in each organization on her resume. Sheleen shares her experiences with IT leadership and their staffs through writing, speaking engagements, radio broadcasts, coaching and mentoring.</p><p>She is a graduate of the College of New Rochelle, New Rochelle, NY and has also been a Senior Consultant with the Cutter Consortium, Boston, MA, and is an Emeritus member of CIO Magazine Editorial Advisory Board. She recently received the Lifetime Achievement Award from Gaming &amp; Leisure magazine, the premiere industry publication. Sheleen is featured in the recently published book by Dan Roberts and Brian Watson: Confessions of a Successful CIO: How the Best CIO’s Tackle Their Toughest Business Challenges. Sheleen was also a panelist at the recent WITI Summit in Silicon Valley, speaking on the topic of attracting women to technology careers.</p>',
				'photo'			=> '/images/advisors/quish-sheleen.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Maria',
				'last_name'		=> 'Horton',
				'slug'			=> 'horton-maria',
				'title'			=> 'President &amp; CEO',
				'title_short'	=> 'President &amp; CEO',
				'company'		=> 'EmeSec, Inc',
				'bio'			=> '<p>Ms. Maria Horton, a retired Navy Commander and the former Chief Information Officer (CIO) for Bethesda Naval Hospital, now known as Walter Reed, is the founder and creator of EmeSec Incorporated. Involved early as a tele-medicine researcher and a published digital imaging expert, Maria has actively contributed to the application of evolving cyber technologies since the late 90’s.  She remains a leader within the industry today delivering industry foresight and solutions to commercial and government clients and speaking on a variety of subjects at conferences, radio programs and in magazine articles.  She also counsels up-and-coming next generation cloud and cyber innovators. Looking to the future, Maria welcomes the opportunity and challenge to discuss making cloud security and engineering your market advantage.</p>',
				'photo'			=> '/images/advisors/horton-maria.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Joseph',
				'last_name'		=> 'Vislocky',
				'slug'			=> 'vislocky-joseph',
				'title'			=> 'Systems Analyst',
				'title_short'	=> 'Systems Analyst',
				'company'		=> 'Kichler Lighting',
				'bio'			=> '<p>Joseph Vislocky is a highly regarded business process improvement and technology executive.</p><p>Joe\'s career in IT began before he even had a career. He taught himself programming while in junior high school by volunteering to type the code into the school’s first PC. The following summer, Joe was teaching those very same skills to gifted elementary school children throughout the school system. By the time he was in college, a professor noticed his techniques and immediately hired him as an instructor for several large firms in the greater Cleveland area.</p><p>He then crossed the bridge from coding into system design, infrastructure and telecom. After receiving three rapid promotions at a large hospital system, Joe became focused on project management, people management and business process improvement.</p><p>He has held technology executive titles in manufacturing, healthcare, fashion, and distribution spaces. Companies ranging from forty to more than a thousand employees have benefitted from Joe’s diverse experiences in strategic analysis and planning, BPI, ERP implementation, ecommerce, ISO certification, warehouse automation and more.</p><p>Joe has been a panelist for discussions on virtualization, business continuity and disaster recovery. He is an active member of the Society for Information Management (SIM) as well as The Project Management Institute (PMI). Joe serves on the Executive Advisory Council for two executive IT conference organizations. He focuses on continual self-improvement by challenging himself to attain certifications beneficial to his clientele.</p><p>Joe resides in northeast Ohio where he and his loving wife are devoted to their two children. He enjoys live music at local wineries, spending time outdoors, and traveling to warm places that broaden the mind. Learn more about Joe at <a href="http://www.JosephVislocky.com" title="Joseph Vislocky\'s website" target="blank">http://www.JosephVislocky.com</a>.</p>',
				'photo'			=> '/images/advisors/vislocky-joseph.jpg',
				'advisor'		=> 1,
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);


		/*****  AUSTIN IT STRATEGIES 2015-09-15 *****/
		Speaker::create([
				'first_name'	=> 'Dave',
				'last_name'		=> 'Bhattacharjee',
				'slug'			=> 'bhattacharjee-dave',
				'title'			=> 'VP Data Analytics',
				'title_short'	=> 'VP Data Analytics',
				'company'		=> 'Stanley Black and Decker',
				'bio'			=> '<p>Dave Bhattacharjee is the Vice President of Data Analytics for Stanley Black and Decker.  In this role, Dave is responsible for building a business unit tasked with monetizing Stanley, Black and Decker’s data assets.  Dave’s organization includes Professional Services focused on Data Science Services and big data and analytics platforms for Retail, Healthcare and Physical Security.</p>
					<p>Prior to Stanley Black and Decker, Dave was at Cisco Systems where as Managing Director for Analytics and Big Data, Dave managed and led Cisco’s consulting services for analytics and big data in the Americas.  He has also held leadership positions at IBM and PriceWaterhouseCoopers where Dave worked with the Fortune 500 on large scale initiatives designed to create business value through data and technology.  Dave has an MBA from the University of Texas at Austin and a Bachelors in Computer Science and Engineering from Arizona State University.</p>',
				'photo'			=> '/images/speakers/bhattacharjee-dave.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Michael',
				'last_name'		=> 'Botts',
				'slug'			=> 'botts-michael',
				'title'			=> 'Director IS, CISO',
				'title_short'	=> 'Director IS, CISO',
				'company'		=> 'SunPower Corporation',
				'bio'			=> '<p>Michael Botts currently serves as Sunpower’s CISO. Mr. Botts manages a talented team in the US and Philippines charged with protecting an inspired organization “Changing the Way Our World Is Powered”.</p>
					<p>He and his team are responsible for enterprise Cybersecurity Strategy, oversight of COGS and Non-COGS security investments, product design, manufacturing, Power Plant security services, residential and commercial data protection/privacy as well as IT/NERC compliance.</p>
					<p>Before joining Sunpower, Mr. Botts served as a Director of Security at Dell where he led the company’s Identity and Access Management Engineering and Operations function.  He and his team are charged with engineering/operating a physical and virtualized Authentication &amp; Directory services supporting over 104,000 global staff, 1,500 corporate applications, Supply Chain partner’s and Services customers. Working collaboratively, his team drove conformance to Network Security standards, Vulnerability Management/Remediation practices, PCI and SOX controls and develop Merger &amp; Acquisition security solutions.</p>
					<p>Prior to Dell, Mr. Botts was First Vice-President of MBNA Corporation.  During his 11 years at MBNA, Michael completed an expatriate assignment in Canada as part of a start-up business where he served as Director of Business Development Services and eighteen month secondment in England where he served as Head of Information Security and lead the extension of IT Security capabilities to the firms Madrid startup business.  Upon returning to the US, he served as the corporate IT Risk Manager where he supported the Chief Technology Officer (CTO) and Chief Risk Officer (CRO).</p>
					<p>He has guest lectured at the W. P. Carey School of Business at Arizona State University, served as a member of the LSU Family Association Board, chaired the 2012 Dell Leadership Program, served on the Dell B.R.I.D.G.E. Global Diversity Employee Resource Group (ERG) board, provided technical consulting to the Austin Area Urban League (AAUL) from 2010 – 2011, and served two terms as the Lake Travis Cavalettes Vice President 2010 – 2012.<p>
					<p>Mr. Botts hold a Masters in Finance/Marketing from Villanova University and Bachelors in Political Science from West Chester University. He is proud parent of Michaela (LSU junior) and Habron (Lake Travis Senior).</p>',
				'photo'			=> '/images/speakers/botts-michael.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Evan',
				'last_name'		=> 'Bowers',
				'slug'			=> 'bowers-evan',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'HealthTronics, Inc',
				'bio'			=> '<p>Evan Bowers serves as Chief Information Officer and Privacy Officer for HealthTronics, Inc., which provides integrated urological and interventional radiology products and services, as well as physician partnership opportunities. Evan brings 20 years of diverse experience in technology, leadership and finance. Prior to joining HealthTronics Evan served as a Chief Technology Officer for HarteHanks, a Direct Marketing company.  Evan received an Bachelor\'s degree in Computer Science from Stonehill College and a Master\'s Degree in Corporate Finance from Indiana University.</p>',
				'photo'			=> '/images/speakers/bowers-evan.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Scott',
				'last_name'		=> 'Brandt',
				'slug'			=> 'brandt-scott',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'Texas Secretary of State',
				'bio'			=> '<p>Scott Brandt is currently employed as the chief information officer / information security officer for the Texas Secretary of State.  Scott graduated from Texas A&amp;M University with a bachelor of science degree in aerospace engineering.  He worked as a flight test engineer and in the semiconductor industry before taking a position at the Texas Workforce Commission (TWC) in the information technology field.  After about 10 years at TWC, Scott accepted the position of IT Director at the Office of the Texas Secretary of State.  He has been a member of the Secretary of State executive team for over ten years.  Scott is a graduate of the FBI Citizens’ Academy associated with the San Antonio field office of the FBI.  He currently serves on the board of the Capital of Texas InfraGard Chapter and on the Computer / Information Systems Department Advisory Board for Parker University.  Scott holds several information security certifications.</p>',
				'photo'			=> '/images/speakers/brandt-scott.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Bob',
				'last_name'		=> 'Brewer',
				'slug'			=> 'brewer-bob',
				'title'			=> 'Enterprise Network Practice Manager',
				'title_short'	=> 'Enterprise Network Practice Manager',
				'company'		=> 'Forsythe',
				'photo'			=> '/images/speakers/brewer-bob.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Andy',
				'last_name'		=> 'Bynum',
				'slug'			=> 'bynum-andy',
				'title'			=> 'Corporate Vice President, Global IT Lead',
				'title_short'	=> 'Corp. VP, Global IT Lead',
				'company'		=> 'Advanced Micro Devices (AMD)',
				'bio'			=> '<p>Andy Bynum is Corporate Vice President for Corporate IT Services at Advanced Micro devices (AMD).  Andy is responsible infrastructure, operations, application development/support, business partner relations and information security.   He brings more than 25 years of information technology experience, with a diverse background in public utilities, financial service, and manufacturing.</p>
					<p>Before joining AMD in July 2013, he was Vice President of Information Technology for Freddie Mac and prior to that Senior Vice President for Service Delivery at National City Corporation (now PNC Bank). In both roles he was responsible for leading IT transformational efforts in support of corporate turnarounds.</p>
					<p>Bynum has a bachelor’s degree in Microbiology from the University of Kansas. He lives in Austin with his wife, Laura, and five children.</p>',
				'photo'			=> '/images/speakers/bynum-andy.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Dana',
				'last_name'		=> 'Cook',
				'slug'			=> 'cook-dana',
				'title'			=> 'Dir. Enterprise Data &amp; App. Modernization',
				'title_short'	=> 'Dir. Enterprise Data &amp; App. Modernization',
				'company'		=> 'University of Texas, Austin',
				'bio'			=> '<p>Dana Cook serves as the Director for Enterprise Data and Application Modernization at The University of Texas at Austin and is responsible for strategic alignment, growth, and transition efforts for the administrative applications across campus.  This includes the coordination of over 1,000 application transitions from the University’s mainframe environment to new technologies.  She also serves on the Board of Directors for the Texas Association of State Systems for Computing and Communication (TASSCC).</p>
					<p>Dana’s career includes a variety of roles at the University of Texas at Austin starting as an application developer in central IT, holding leadership positions in central IT, Facilities Services, Human Resources, and Financial Information Systems and leading a wide variety of enterprise programs and projects including the Human Resource Management System (HRMS) and the University Portal.  Dana serves as a guest lecturer at UT Austin and has contributed to a variety of higher education IT publications.</p>
					<p>Prior to her current role, Dana was a Director at the Texas Comptroller of Public Accounts responsible for the implementation and support of such systems as the Texas Statewide ERP (CAPPS), Treasury, Statewide Fleet operations, and other legacy HR, Payroll and Financial statewide systems.</p>
					<p>Throughout her career, Dana has volunteered her time and experience assisting non-profits and others to streamline operations including St. Jude Children’s Research Hospital, St. Edwards’s University, the City of Austin, and the University of California, Berkeley.</p>
					<p>Dana holds a BBA in Management and Marketing from The University of Texas at Austin and an MBA from St. Edward’s University.  Dana is a certified Project Management Professional (PMP), certified facilitator and train-the-trainer, and is ITIL certified.</p>',
				'photo'			=> '/images/speakers/cook-dana.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Jake',
				'last_name'		=> 'Dominguez',
				'slug'			=> 'dominguez-jake',
				'title'			=> 'Former Chief Information Officer',
				'title_short'	=> 'Former CIO',
				'company'		=> 'Advanced Micro Devices (AMD)',
				'bio'			=> '<p>Jake Dominguez was most recently CIO at AMD and was responsible for leading the company’s global IT organization through a major transformation of the enterprise. He brings over 30 years of engineering and information technology experience, with a diverse background in academia, semiconductor, computer services, and manufacturing industries. Under his leadership AMD completed his vision of a major datacenter consolidation effort, which focused on transitioning more than 3,500 servers from Austin, Texas to Atlanta, Georgia under one roof. This accomplishment has been recognized and highlighted in numerous publications including eWeek, ZDNet and Tom’s Hardware. He also received the 2014 Stevie Award for CIO of the Year and was selected as one of Computerworld’s 2015 100 Premier IT Leaders.</p>
					<p>Before joining AMD in September 2011, Dominguez held various executive roles within HP.</p>
					<p>Prior to his leadership positions at HP, Dominguez spent more than six years at AMD, with various roles in manufacturing and IT.</p>
					<p>Dominguez has a bachelor’s degree in Computer Science and Systems Design from the University of Texas at San Antonio. He lives in Austin with his wife Mya.</p>',
				'photo'			=> '/images/speakers/dominguez-jake.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Tom',
				'last_name'		=> 'Edwards',
				'slug'			=> 'edwards-tom',
				'title'			=> 'Resident Agent in Charge, Austin Resident Office',
				'title_short'	=> 'Resident Agent in Charge, Austin Resident Office',
				'company'		=> 'U.S Secret Service',
				'bio'			=> '<p>Tom Edwards is a 16-year veteran of the U.S. Secret Service.  As the Resident Agent in Charge of the Austin Resident Office, Tom oversees the daily investigative and protective activities of the agency’s local office.  His office sponsors the Central Texas Financial Fraud Task Force which partners with local police agencies to combat various financial and electronic crimes impacting the community.  Throughout his law enforcement career, he has served in numerous protective, investigative, and headquarters assignments in California, Maryland, Washington, D.C., and Lima, Peru.  Prior to his current appointment, he developed and implemented agency policy relating to classified network security, insider threat, and risk assessments.  Tom was also congressional fellow to the U.S. Senate Committee on the Judiciary.  While on the Hill, he managed a legislative portfolio of law enforcement legislation regarding data breaches, currency counterfeiting, mortgage fraud, and the reauthorization of the Patriot Act.</p>',
				'photo'			=> '/images/speakers/edwards-tom.png',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Andrew',
				'last_name'		=> 'Fernandes',
				'slug'			=> 'fernandes-andrew',
				'title'			=> 'Senior Director, Global Resiliency Program',
				'title_short'	=> 'Sr. Dir., Global Resiliency Program',
				'company'		=> 'Epicor',
				'bio'			=> '					<p>Andrew has 20+ years management experience with a diverse educational background experience in finance, quality, risk management, business continuity and crisis management. He has implemented all ten professional practices from program initiation and management to coordination with external agencies.</p>
					<p>Andrew is currently engaged as Senior Director, Global Resiliency Program, with Epicor Software Corporation.  Prior to Epicor, Andrew has been in a senior management position over the last 15 years either in a consulting or a  practitioner role with  IBM Resiliency Services, Dell Inc, and GE IT Solutions.</p>
					<p>Andrew’s strength is in developing and building BCP program plans and provides frame planning to global business partners along with managing associated budget contracts and projects. His niche expertise is supply chain business continuity management. He has led development of business continuity testing training and exercise schedule at the enterprise level and maintained corporate wide management plans inclusive of working with communications team for incident management planning. He has also led development and created of standards to ensure regulatory readiness, and internal audits.  Andrew is also recognized by his peers as work place expert in pandemic preparedness having successfully rolled this out globally.</p>
					<p>Andrew has been a frequent speaker on business continuity and supply chain risk management circuit, has spoken internationally to organizations such as Continuity Insights, Disaster Recovery Journal, Chapter of Contingency Planners, planner end user groups and end supply chain companies. He has also authored numerous white papers on crisis management, business continuity and supply chain management.</p>
					<h4>Chairs</h4>
					<ul>
						<li>Co-Chair – Professional Development Committee: Disaster Recovery Institute International (DRII) – Core team that is involved in the rewrite, approval of the ten professional practice standards for business continuity</li>
						<li>Supply Chain Business Continuity Management : Design and creation of BCM program for third party vendors to align to professional practices and  requirements of client</li>
						<li>DRII - Advise on recovery strategies and interim operational processes that allowed compliance with regulatory requirements.</li>
					</ul>
					<h4>Education &amp; Certifications</h4>
					<ul>
						<li>B.Comm,/B.B.A, Finance and Auditing, University of Bombay</li>
						<li>Certified in  Sales and Marketing – Sheridan College</li>
						<li>Certified as Professional Manager – Canadian Institute of Management</li>
						<li>Certified  Business Continuity Professional – CBCP, MBCI</li>
						<li>Certified  Six Sigma Black Belt</li>
						<li>Certified ISO Auditor</li>
						<li>Certified Project Management Professional</li>
					</ul>',
				'photo'			=> '/images/speakers/fernandes-andrew.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Gregory',
				'last_name'		=> 'Flay',
				'slug'			=> 'flay-gregory',
				'title'			=> 'Vice President, Information Technology',
				'title_short'	=> 'Vice President IT',
				'company'		=> 'NRG Home Solar',
				'bio'			=> '<p>As Vice President of Information Technology for the Home Solar division of NRG Energy, Greg Flay oversees the development and operation of systems and processes that support one of the top sales, installation, and financing residential solar panel systems businesses in the US.</p>
					<p>Mr. Flay joined NRG in 2000 as a Manager of Plant Operations IT, working primarily on power station acquisitions in Australia, the Czech Republic, Estonia, Hungary, Turkey, Bolivia, Peru, and Brazil as well as a large portfolio within the US. Mr. Flay led the $18M integration of Texas Genco in 2006 as well as the $45M integration of Reliant Energy in 2009. In 2011, he moved to Austin to serve as a turnaround CIO for Green Mountain Energy. He later served in a similar capacity within NRG’s home warranty, home services, and residential solar businesses, in each case migrating the business from a homegrown set of business systems and processes onto enterprise-class systems based on the Salesforce platform.</p>
					<p>Mr. Flay holds a Ph.D. from the University of Minnesota.</p>
					<h4>Company Background</h4>
					<p>NRG is leading a customer-driven change in the U.S. energy industry by delivering cleaner and smarter energy choices, while building on the strength of the nation’s largest and most diverse competitive power portfolio. A Fortune 200 company, we create value through reliable and efficient conventional generation while driving innovation in solar and renewable power, electric vehicle ecosystems, carbon capture technology and customer-centric energy solutions. Our retail electricity providers serve more almost 3 million residential and commercial customers throughout the country.</p>
					<p>Revenue (ttm): $16.2 billion<br>Employees: 9,806</p>',
				'photo'			=> '/images/speakers/flay-gregory.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Rani',
				'last_name'		=> 'Johnson',
				'slug'			=> 'johnson-rani',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'Lower Colorado River Authority (LCRA)',
				'photo'			=> '/images/speakers/johnson-rani.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Martin',
				'slug'			=> 'martin-jeff',
				'title'			=> 'Chief Executive Officer &amp; Founder',
				'title_short'	=> 'CEO &amp; Founder',
				'company'		=> 'Martin Vistra',
				'bio'			=> '<p>As a leader in the executive IT community, Jeff has lent his exceptional leadership and subject-matter expertise to a variety of executive roles in the IT industry over his 23+ year career. Most recently holding the position of Vice President of Strategy and Architecture, Jeff was responsible for enabling Dell’s strategic transformation by deﬁning the IT (transformation) road map, guiding the delivery of globally consistent business value, and ensuring Dell IT systems were reliable, scalable and efficient. Prior to leading the Strategy and Architecture team, Jeff was the CIO of Dell IT – Product &amp; Supply Chain.</p>
					<p>Before Dell, Jeff built his career in the IT Business and Transformation industry, holding key leadership roles at PepsiCo International, WM Wrigley Jr., Tellabs, Baxter Healthcare and in the U.S. Navy.</p>
					<h4>SERVICE OFFERINGS</h4>
					<p><em>Business and IT Strategy</em></p>
					<p>Executive alignment strategy and planning<br>
						Executive stakeholder strategy and plan deliverables<br>
						IT Strategy document and detailed plan creation<br>
						M&A and integration planning<br>
						IT cost reduction strategies for vendor and software contracts</p>
					<p><em>Enterprise Architecture and Roadmap</em></p>
					<p>Enterprise Architecture (EA) Program development<br>
						Detailed EA deliverables development<br>
						Creation of an EA Roadmap<br>
						Cloud migration strategy<br>
						Software selection playbook<br>
						IT technical debt reduction strategies<br></p>
					<p><em>High Performance Organization Design</em></p>
					<p>High performance IT organization design<br>
						Turnaround plan for trouble IT organizational or IT functional area<br>
						IT Organizational Strategy Development<br>
						IT Leadership Development Program creation<br>
						IT Site strategy creation</p>
					<h4>Education</h4>
					<p>M.B.A. Lake Forest Graduate School of Management, 1999<br>
						B.S. Illinois State University – Accounting and Information Systems, 1993</p>',
				'photo'			=> '/images/speakers/martin-jeff.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Larry',
				'last_name'		=> 'Moore',
				'slug'			=> 'moore-larry',
				'title'			=> 'VP &amp; IT Sector Chief',
				'title_short'	=> 'VP &amp; IT Sector Chief',
				'company'		=> 'Infragard (Austin chapter)',
				'bio'			=> '<p>Larry Moore has over sixteen years of Information Security experience as part of his thirty year IT career.  Larry has worded on diverse areas of Information Security including architecture, secure software development, penetration testing, server administration, project manager and executive manager.  Larry has served at the State of Texas in their critical infrastructure protection and in the technical and financial sector.</p>
					<p>Larry graduated from the Florida Institute of Technology with a degree in Computer Science and began his work on various projects for NASA.  His post-NASA work included applications, device drivers and kernel extensions on various operation systems such as OS/2, Windows and Unix variants.  His work on the AIX security kernel included audit, single sign-on, PKI and a behavioral-based intrusion detection tool which was a precursor to his migration to the information security field.  Larry recently served as the lead Solution Security Officer for Gemalto’s North American region where he ensured the proper delivery of security requirements for the company’s trusted platforms and mobile payment solutions for large and small customers.  Larry has also audited, designed or modified the security programs for three of the company’s large data centers across the globe to enable customer mobile payment processing.</p>
					<p>Larry serves on the board at the Computer Science department at Parker University in Dallas and the Austin chapter of the International Systems and Security Association.  Larry is also Vice-President and IT Sector Chief for the Austin chapter of Infragard and has given numerous presentations and written numerous articles on security architecture, threat intelligence and software development.</p>',
				'photo'			=> '/images/speakers/moore-larry.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Neill',
				'last_name'		=> 'Robert',
				'slug'			=> 'neill-robert',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'Harte Hanks',
				'bio'			=> '<p>Robert Neill is chief information officer for Harte Hanks.  In this role, Robert is responsible for the management of enterprise technical services.  This includes telecommunication infrastructure, electronic messaging, wireless communications, back-office applications (financial reporting, human resources, CRM), data center operations and end user support.</p>
					<p>In addition, Robert is responsible for the development of security and information technology policies and plays a key role in monitoring compliance with Sarbanes-Oxley and data privacy related regulatory requirements.  Robert is also a member of the senior leadership team responsible for the establishment and execution of the company’s strategic business plans.</p>
					<p>Prior to his arrival at Harte Hanks in 2001, Robert served as a consulting manager at BearingPoint (formerly KPMG Consulting), where he managed a variety of software implementation projects. In addition, he has experience as an accountant and financial analyst in state and local government.</p>
					<p>Robert holds both a Bachelor in Business Administration and Master in Professional Accounting from the University of Texas at Austin.</p>
					<p>Robert enjoys serving as golf caddy for his teenage daughters and is an avid Texas Longhorn fan.  He has also been known to blog occasionally at robertnotbob.net and to tweet now and then @rdntx</p>',
				'photo'			=> '/images/speakers/neill-robert.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::where('slug', '=', 'neill-robert')->delete();

		Speaker::create([
				'first_name'	=> 'Wendy',
				'last_name'		=> 'Nather',
				'slug'			=> 'nather-wendy',
				'title'			=> 'Research Director',
				'title_short'	=> 'Research Director',
				'company'		=> 'Retail Cyber Intelligence Sharing Center (R-CISC)',
				'bio'			=> '<p>Wendy Nather is Research Director at the Retail Cyber Intelligence Sharing Center (R-CISC), where she is responsible for advancing the state of resources and knowledge to help organizations defend their infrastructure from attackers. She was previously Research Director of the Information Security Practice at independent analyst firm 451 Research, covering the security industry in areas such as application security, threat intelligence, security services, and other emerging technologies.</p>
					<p>Wendy has served as a CISO in both the private and public sectors. She led IT security for the EMEA region of the investment banking division of Swiss Bank Corporation (now UBS), as well as for the Texas Education Agency. She speaks regularly in locations around the world on topics ranging from threat intelligence to identity and access management, risk analysis, incident response, data security, and societal and privacy issues. Wendy is co-author of The Cloud Security Rules, and was listed as one of SC Magazine\'s Women in IT Security "Power Players" in 2014. She is an advisory board member for the RSA Conference, and serves on the board of directors for Securing Change, an organization that helps provide free security services to nonprofit groups. She is based in Austin, Texas, and you can follow her on Twitter as <a href="https://www.twitter.com/RCISCwendy" target="_blank" title="Wendy Nather - Twitter">@RCISCwendy</a>.</p>',
				'photo'			=> '/images/speakers/nather-wendy.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Lawanda',
				'last_name'		=> 'Parnell',
				'slug'			=> 'parnell-lawanda',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'Pedernales Electric Cooperative',
				'bio'			=> '<p>Lawanda Parnell is the Chief Information Officer at Pedernales Electric Cooperative (PEC) located in Johnson City, Texas.  Lawanda joined PEC in November 2012.  Prior to joining PEC, Lawanda was Senior Director and interim CIO at CPS Energy in San Antonio, Texas.  Lawanda has worked as an IT consultant and held many IT management and executive positions at IBM.</p>
					<p>As CIO at Pedernales Electric Cooperative, Lawanda is responsible for all aspects of the Cooperative\'s IT infrastructure, including application development & support, hardware, network, telecommunications, Help Desk, records management and cyber-security.  PEC is the largest distribution electric cooperative in the U.S.</p>
					<p>Lawanda earned her B.S. degree in Business Administration from the University of Florida.  She earned her M.S degree in the Management of Technology from the National Technological University.</p>
					<p>Lawanda lives in Horseshoe Bay, Texas.  She enjoys fishing, traveling, parasailing, scrapbooking and reading.</p>',
				'photo'			=> '/images/speakers/parnell-lawanda.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'George',
				'last_name'		=> 'Rios',
				'slug'			=> 'rios-george',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'Texas Parks &amp; Wildlife',
				'photo'			=> '/images/speakers/rios-george.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Ahn',
				'last_name'		=> 'Selissen',
				'slug'			=> 'selissen-ahn',
				'title'			=> 'Director Application Services',
				'title_short'	=> 'Director Application Services',
				'company'		=> 'Texas Comptroller of Public Accounts',
				'photo'			=> '/images/speakers/selissen-ahn.jpg',
				'published'		=> Carbon::create(2015, 09, 09, 11, 48, 32),
			]);

		Speaker::create([
				'first_name'	=> 'Jeff',
				'last_name'		=> 'Smedley',
				'slug'			=> 'smedley-jeff',
				'title'			=> 'Chief Information Officer',
				'title_short'	=> 'CIO',
				'company'		=> 'J&amp;J Worldwide Services',
				'bio'			=> '<p>Jeff Smedley is the Chief Information Officer and Vice President for J&amp;J Worldwide Services (J&amp;J), the largest privately held Department of Defense operations and maintenance contractors in the industry. J&amp;J’s services offerings include military base operations support services, logistics services, and medical facilities operations, maintenance, and construction services for all branches of the U.S. military at more than 150 locations across the United States and abroad. As a key member of the J&J management team his broad responsibilities include engineering, design, planning, implementation and direction of all company information technology systems including interface with existing client systems.</p>
					<p>Prior to joining J&amp;J, Jeff played an integral part in building the systems consulting practice for Sterling Information Group in the mid-1990’s. After the acquisition of Sterling, he formed Nspire Group, Inc., a recognized systems consulting practice still active in Austin, Texas. In 1999, he became the Chief Information Officer and Vice President of Internet Operations at FreeMe.com. In this capacity he was instrumental in structuring the company for acquisition by VA Linux in 2001. FreeMe.com was the first application service provider (ASP) in Austin with more than 50,000 users. Jeff also helped found and held the position of Director of Operations for Alter Point, a configuration management software company. He helped Alter Point define the product strategy and was a key player in bringing them to the first round of funding in 2002.</p>
					<p>Culminating his highly successful business development experience in 2003, Jeff became the first CIO at J&amp;J where he continues to provide business and technology leadership as he has built and implemented a highly successful IT strategy companywide. Jeff has had several articles published on IT culture and IT management and co-authored a book on IT Leadership. Jeff currently lives in Austin and he is also an accomplished skydiver.</p>',
				'photo'			=> '/images/speakers/smedley-jeff.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Mike',
				'last_name'		=> 'Sturm',
				'slug'			=> 'sturm-mike',
				'title'			=> 'Director Information Technology',
				'title_short'	=> 'Director IT',
				'company'		=> 'City of San Marcos',
				'photo'			=> '/images/speakers/sturm-mike.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Jay',
				'last_name'		=> 'Waldo',
				'slug'			=> 'waldo-jay',
				'title'			=> 'Interim Chief Information Officer',
				'title_short'	=> 'Interim CIO',
				'company'		=> 'Texas Comptroller of Public Accounts',
				'bio'			=> 'Jay Waldo has served in Texas state government since 2000 including software development and business process improvement work at the Department of Agriculture and the Comptroller of Public Accounts.  Prior to working in Texas, Jay worked as a software engineer and consultant in private industry.  Jay is currently the Director for Innovation and Technology at the Texas Comptroller of Public Accounts.  He is a graduate of Augustana College in Sioux Falls, South Dakota.',
				'photo'			=> '/images/speakers/waldo-jay.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Speaker::create([
				'first_name'	=> 'Marc',
				'last_name'		=> 'Yoder',
				'slug'			=> 'yoder-marc',
				'title'			=> 'CISO and Senior Director, Security and Disaster Recovery',
				'title_short'	=> 'CISO &amp; Sr. Dir. Security &amp; Disaster Recovery',
				'company'		=> 'NTT Data Corporation',
				'bio'			=> '<p>A seasoned technologist with more than 20 years experience, with a comprehensive background in developing Business/Technology solutions in the areas of Information Security, Risk Management, Benchmarking, Compliance, and Business Continuity/Disaster Recovery Planning.</p>
					<p>Mr. Yoder has a proven record of identifying and solving highly technical business technology challenges, developing secure architectures currently in place by multiple fortune 500 organizations, and working with Federal and International clients. He served as a principal on both the largest cyber-security and largest wireless projects in industry history.<p>
					<p>An engaging speaker, Mr. Yoder has served as a guest speaker for organizations such as The American Petroleum Institute, The Axiom Lab for Applied Research, NATO, and at American and Foreign Universities.</p>
					<p>Additionally, Mr. Yoder has written Information Security Management Systems (ISMSs) based upon ISO standards, and performed compliance benchmarking and strategy for Fortune 50 organizations.</p>'
				'photo'			=> '/images/speakers/yoder-marc.jpg',
				'published'		=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		Schema::drop('speakers');
	}

}
