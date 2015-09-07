<?php

use Illuminate\Database\Seeder;
use App\Models\Benefit;
use Carbon\Carbon;

class BenefitsTableSeeder extends Seeder {
	
	public function run() {

		DB::table('benefits')->delete();

		/*

			Schema::create('reasons', function(Blueprint $table)
			{
				$table->increments('id');
				$table->string('title');
				$table->string('text');
				$table->integer('priority');
				$table->tinyInteger('reason')->default(1);
				$table->timestamps();
				$table->timestamp('published')->default('0000-00-00 00:00:00');
				$table->softDeletes();
			});

			protected $fillable = [
				'title',
				'text',
				'priority',
				'reason',
				'published',
			];

		*/

		Benefit::create([
				'title'				=> 'Intro',
				'text'				=> 'Our attendee’s consist of CIOs, CTOs SVPs &amp; VPs of IT, IT Directors and Sr. Level IT Executives of fortune 100-5000 companies and equivalent healthcare, government, Financial and educational organizations. We will have multiple vertical markets represented at the event, including retail, manufacturing, financial, insurance, healthcare, education, and local and state government entities.',
				'priority'			=> 0,
				'reason'			=> 0,
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Benefit::create([
				'title'				=> 'Networking',
				'text'				=> 'Networking is what makes our events work. Many of your peers have faced similar challenges to ones that you may currently be working with. Being able to draw from their experiences, expertise and hearing what worked and what did not, can provide valuable insight as to the next steps or solution that you use.',
				'priority'			=> 1,
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Benefit::create([
				'title'				=> 'Event Topics',
				'text'				=> 'We work to ensure that our topics are current and address critical challenges and issues being faced by local IT Professionals in the community. The topics are then reviewed throughout the year to ensure that they are current, on point and appropriately address the needs of our Executive level IT audience.',
				'priority'			=> 2,
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Benefit::create([
				'title'				=> 'Panels &amp; Presenters',
				'text'				=> 'Our Panelists &amp; Presenters will consist of IT Leaders from the local community and Industry Experts who are knowledgeable, passionate and can bring value to the topics being discussed.',
				'priority'			=> 3,
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

		Benefit::create([
				'title'				=> 'Our Partners',
				'text'				=> 'In each region, we align ourselves with local IT Support Groups, User Groups and IT Professionals who are working to promote IT to the local Community. We encourage you to network with these groups at the event and get involved as they have a big impact on promoting IT throughout the local community.',
				'priority'			=> 4,
				'published'			=> Carbon::create(2015, 08, 28, 15, 05, 29),
			]);

	}
}