<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Carbon\Carbon;
use App\Models\Sponsor;

class CreateSponsorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('sponsors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('slug');
			$table->string('company');
			$table->string('website');
			$table->string('slogan')->nullable();
			$table->text('bio')->nullable();
			$table->text('tags')->nullable();
			$table->text('options')->nullable();
			$table->text('contacts')->nullable();
			$table->string('photo')->nullable();
			$table->timestamps();
			$table->timestamp('published')->nullable();
			$table->softDeletes();
		});

		Sponsor::create([
				'company'	=> 'Cylance',
				'slug'		=> 'cylance',
				'website'	=> 'http://www.cylance.com',
				'bio'		=> '<p>Cylance is the first company to apply artificial intelligence, algorithmic science and machine learning to cyber security and improve the way companies, governments and end users proactively solve the world’s most difficult security problems. Using a breakthrough mathematical process, Cylance quickly and accurately identifies what is safe and what is a threat, not just what is in a blacklist or whitelist. Cylance provides the technology and services to be truly predictive and preventive against advanced threats.</p>',
				'photo'		=> '/images/sponsors/cylance.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Dynatrace',
				'slug'		=> 'dynatrace',
				'website'	=> 'http://www.dynatrace.com',
				'bio'		=> '<p>Dynatrace is the innovator behind the industry’s premier Digital Performance Platform, making real-time information about digital performance visible and actionable for everyone across business and IT. We help customers of all sizes see their applications and digital channels through the lens of their end users. More than 7,500 organizations use these insights to master complexity, gain operational agility and grow revenue by delivering amazing customer experiences.</p>',
				'photo'		=> '/images/sponsors/dynatrace.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Forsythe Technology',
				'slug'		=> 'forsythe',
				'website'	=> 'http://www.forsythe.com',
				'bio'		=> '<p>Founded in 1971, Forsythe is one of the largest independent IT integrators in North America, serving approximately 1,000 U.S. and Canada-based companies. Forsythe provides independent consulting, hosting solutions and technology financing, as well as IT products and services from leading IT infrastructure manufacturers and vendors. Clients come to Forsythe for help optimizing cost, managing risk, improving performance and enabling innovation within their IT and data center operations to deliver greater value to their business.</p>',
				'photo'		=> '/images/sponsors/forsythe.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Hitachi Data Systems',
				'slug'		=> 'hitachi',
				'website'	=> 'http://www.hitachi.com',
				'bio'		=> '<p>Hitachi Data Systems builds information management and Social Innovation solutions for business and social prosperity. Our IT solutions and services drive strategic management and analysis of the world’s data. Only HDS integrates the best of Hitachi IT and operational technology to deliver the insight that businesses need to thrive. HDS.com</p>',
				'photo'		=> '/images/sponsors/hitachi.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Workday',
				'slug'		=> 'workday',
				'website'	=> 'http://www.workday.com',
				'bio'		=> '<p>Workday is a leading provider of enterprise cloud applications for financeand human resources. Founded in 2005, Workday delivers financial management, human capital management, and analytics applications designed for the world\'s largest companies, educational institutions, and government agencies. Hundreds of organizations, ranging from medium-sized businesses to Fortune 50 enterprises, have selected Workday.</p>',
				'photo'		=> '/images/sponsors/workday.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'MCCI',
				'slug'		=> 'mcci',
				'website'	=> 'http://www.mccinnovations.com/',
				'bio'		=> '<p>MCCi provides innovative solutions that transform paper-based processes into smart practices. MCCi works with organizations on records and document management, scanning and business workflow. As the #1 Laserfiche reseller, we are passionate about helping organizations run their office more efficiently – saving time, money and resources.</p>',
				'photo'		=> '/images/sponsors/mcci.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Good Technologies',
				'slug'		=> 'good',
				'website'	=> 'http://www.good.com',
				'bio'		=> '<p>Good Technology is the leader in secure mobility, providing the leading secure mobility solution for enterprises and governments worldwide, across all stages of the mobility lifecycle. Good’s comprehensive, end-to-end secure mobility solutions portfolio consists of a suite of collaboration applications, a secure mobility platform, mobile device management, unified monitoring, management and analytics and a third-party application and partner ecosystem. Good has more than 5,000 customers in 184 countries, including more than 50 of the FORTUNE 100™ companies. Learn more at www.good.com.</p>',
				'photo'		=> '/images/sponsors/good.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Nimble Storage',
				'slug'		=> 'nimble-storage',
				'website'	=> 'http://www.nimblestorage.com',
				'bio'		=> '<p>The Power of One: A Single Storage Consolidation Platform. Most storage architectures were engineered to deliver just a single functional benefit: high performance or high capacity.The Nimble Storage Adaptive Flash platform is transforming this land of storage silos. Enterprises can use a single architectural approach to cater dynamically to varying workloads’ needs for performance and capacity, as well as data protection. Only Nimble offers the Power of One: gain the benefits of consolidation, without compromising the ability to deliver the service levels required for specific workloads. IT organizations that use the Nimble Storage Adaptive Flash platform can predict, manage, and deliver the storage that is required to optimize applications and workloads across the enterprise.</p>',
				'photo'		=> '/images/sponsors/nimble-storage.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Windstream',
				'slug'		=> 'windstream',
				'website'	=> 'http://www.windstream.com',
				'bio'		=> '<p>Windstream, a FORTUNE 500 company, is a leading provider of advanced network communications and technology solutions, including cloud computing and managed services, to businesses nationwide.</p>
					<p>Windstream Hosted Solutions offers one of the most comprehensive enterprise-class cloud and managed services portfolios in the industry. From robust cloud computing solutions including public, private and hybrid cloud and cloud storage to complete managed services and colocation options, your network infrastructure, applications, systems and data are maintained in highly secure data centers strategically located nationwide.</p>',
				'photo'		=> '/images/sponsors/windstream.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> '2FA',
				'slug'		=> '2fa',
				'website'	=> 'http://www.2fa.com',
				'bio'		=> '<p>2FA Inc. is a cybersecurity company created on the single vision of simplifying authentication. 2FA serves customers in diverse industries including: public sector, healthcare, and enterprise. 2FA supports over 1,000 customers and millions of users around the world, including deployments in all 50 states and over 25 countries.</p>',
				'photo'		=> '/images/sponsors/2fa.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'SecureNation',
				'slug'		=> 'secure-nation',
				'website'	=> 'http://www.securenation.com',
				'bio'		=> '<p>SecureNation’s is a “Network Security Advocate and Technology Ally” for our clients addressing almost all of their IT Security needs.  We are partnered with most of the industry leading technologies and we have over 300 Gartner Magic Quadrant partners.  We have saved millions of dollars for organizations across the US from colleges, financial institutions, state and local government, health-care to Fortune 500.  Solving information security and overall technology issues normally at a fraction of the cost.  The backbone of SecureNation is total transparency, deep discount negotiation, honesty and long lasting relationships.</p>',
				'photo'		=> '/images/sponsors/secure-nation.png',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
			]);

		Sponsor::create([
				'company'	=> 'Arbor Networks',
				'slug'		=> 'arbor-networks',
				'website'	=> 'http://www.arbornetworks.com',
				'bio'		=> '<p>Arbor Networks helps secure the world\'s largest enterprise and service provider networks from DDoS attacks and advanced threats. Arbor strives to be the "force multipler," making network and security teams the experts. Our goal is to provide a richer picture into networks and more security context - so customers can solve problems faster and help reduce the risk to their business.</p>',
				'photo'		=> '/images/sponsors/arbor-networks.jpg',
				'published'	=> Carbon::create(2015, 09, 04, 19, 37, 05),
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
		Schema::drop('sponsors');
	}

}
