<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Helpers\Helpers;
use App\Models\Registration;
use App\Models\Conference;

class RegistrationController extends Controller
{
	//

	protected $debug	= true;
	protected $steps	= 5;
	protected $titles	= [
			1 => 'Basic Information',
			2 => 'Badge Details',
			3 => 'Attendee Address',
			4 => 'Direct Reports',
			5 => 'Confirmation',
			6 => 'Registration Confirmed',
		];

	public function index()
	{
		$route				= Helpers::routeinfo();
		$options			= Helpers::options($route);
		$navs				= Helpers::navigation($route, $options);
		$sub				= Helpers::navigation($route, $options, true);

		list($i, $method)	= $this->getStep();
		$step				= $this->step($i);

		return view('pages/register', compact('step', 'route', 'options', 'navs', 'sub'));
	}

	public function store(RegistrationRequest $request)
	{
		list($step, $method) = $this->getStep();

		$step = $step + 1;

		\Session::put('registration.step', $step);

		foreach ($_POST as $key => $value)
		{
			if ($key !== '_token') {
				\Session::put('registration.' . $key, $value);
			}
		}

//		dd(\Session::all());
		return redirect('/register');
	}

	protected function getStep()
	{
		$route 		= Helpers::routeinfo();
		$method		= 'none';

		if (count($route->params) === 1) {
			if ($route->params['step'] === 'confirmed')
			{
				$step = 6;
				$method = 'confirmed';
			} else {
				$step	= (int)$route->params['step'];
				$method	= 'route';
			}
		}

		if (empty($step)) {
			$step 	= \Session::get('registration.step');
			$step	= (int)$step;
			$method	= 'session';
		}

		if ($step <= 0)
		{
			$step	= 1;
			$method	= 'defaultvalue';
		}

		return [(int)$step, $method];
	}

	protected function step($step = 1)
	{
		$steps	= (object)[
			'debug'		=> $this->debug,
			'step'		=> $step,
			'max'		=> $this->steps,
			'titles'	=> $this->titles,
			'defaults'	=> $this->defaults($step),
		];

		$conferences	= ['' => 'Select...'];
		$attendee		= [];

		if ($step === 1 || $step >= $this->steps)
		{
				$events			= Conference::where('end_date', '>=', \Carbon\Carbon::now())
											->published()
											->orderBy('start_date')
											->get();

				if (is_object($events))
				{
					foreach ($events as $event)
					{
						$event = (object)$event->toArray();
						$conferences[$event->slug] = $event->city . ', ' . $event->state . ' ' . ($step === 1 ? '| ' . ((bool)$event->coming === true ? date('F Y', strtotime($event->start_date)) : date('F j, Y', strtotime($event->start_date))) : date('Y', strtotime($event->start_date)));
					}
				}

				$attendee		= [
					''			=> 'Select...',
					'advisor'	=> 'National Advisory Board',
					'sponsor'	=> 'Sponsor',
					'attendee'	=> 'Conference Attendee',
				];
		}

		switch ($step)
		{
			case 5:
				$steps->events		= (array)$conferences;
				$steps->attendee	= (array)$attendee;
				break;
			case 4:
				break;
			case 3:
				break;
			case 2:
				break;
			default:

				$steps->events		= (array)$conferences;
				$steps->attendee	= (array)$attendee;
				break;
		}

		return $steps;
	}

	protected function defaults($step)
	{

		$defaults	= (object)[];
		switch ($step)
		{
			case 5:		$fields = ['conference', 'attendee', 'email', 'phone', 'first_name', 'last_name', 'company', 'title', 'tagitm', 'street', 'city', 'state', 'postal', 'referrals']; break;
			case 4:		$fields = ['referrals']; break;
			case 3:		$fields = ['street', 'city', 'state', 'postal']; break;
			case 2:		$fields = ['first_name', 'last_name', 'company', 'title', 'tagitm']; break;
			default:	$fields = ['conference', 'attendee', 'email', 'phone']; break;
		}

		foreach ($fields as $field)
		{
			$defaults->$field = \Session::get('registration.' . $field, \Input::old($field));
		}

		return $defaults;
	}

}
