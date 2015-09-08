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

	public function index()
	{
		$route		= Helpers::routeinfo();
		$options	= Helpers::options($route);
		$navs		= Helpers::navigation($route, $options);
		$sub		= Helpers::navigation($route, $options, true);
		$i			= 1;
		$step 		= (object)[
			'debug'			=> $this->debug,
			'step'			=> $i,
			'max'			=> $this->steps,
			'titles'		=> $this->getTitles($i),
			'defaults'		=> $this->getDefaults($i),
		];

		if ($i === 1)
		{
			$step->events		= $this->getEvents($i);
			$step->attendance	= $this->getAttendance($i);
		}

		return view('pages/register', compact('step', 'route', 'options', 'navs', 'sub'));
	}

	public function store(RegistrationRequest $request)
	{
		$post 		= $this->postValues();
		$values		= $this->getValues();
		if (!empty($values->email) && !empty($values->conference))
		{
			$stuff	= $values;
			unset($stuff->_token);
			dd((array)$stuff);
			$update = Registration::where('conference', '=', $values->conference)
								->where('email', '=', $values->email)
								->take(1)
								->update((array)$stuff);
			if ($update === null || (int)$update <= 0)
			{
				$insert	= Registration::create($values);
				dd($insert . ' In the DB');
			} else {
				dd($update . ' Updated DB');
			}
		}

	}

	protected function postValues()
	{
		foreach ($_POST as $k => $v)
		{
			if ($k !== '_token')
			{
				\Session::put('registration.' . $k, $v);
			}
		}
		return $_POST;
	}

	protected function getValues()
	{
		$input		= $this->getInput();
		$session	= $this->getSession();
		$values		= [];

		if (is_array($input))
		{
			foreach ($input as $k => $v)
			{
				$values[$k] = $v;
			}
		}

		if (is_array($session))
		{
			foreach ($session as $k => $v)
			{
				$values[$k] = $v;
			}
		}

		return (object)$values;
	}

	protected function getSession()
	{
		return \Session::get('registration');
	}

	protected function getInput()
	{
		return \Input::all();
	}

	protected function getDB($email = 'EMAIL', $conference = 'CONFERENCE')
	{
		$db	= Registrations::where('email', '=', strtolower($email))
							->where('conference', '=', strtolower($conference))
							->first();
		return $db;
	}

	protected function getTitles($i = 1)
	{
		return [
			1 => 'Basic Information',
			2 => 'Badge Details',
			3 => 'Attendee Address',
			4 => 'Direct Reports',
			5 => 'Confirmation',
			6 => 'Registration Confirmed',
		];
	}

	protected function getStep($values) {
		foreach ($values as $key => $value)
		{

		}
	}

	protected function getEvents($i = 1)
	{
		$events = [' ' => 'Select one...'];
		if ($i === 1)
		{
			$conferences	= Conference::where('start_date', '>', Carbon::now())->get();
			$conferences 	= Helpers::keysByField($conferences, 'slug');

			foreach ($conferences as $slug => $event)
			{
				$events[$slug]	= $event->city . ', ' . $event->state . ' | ' . date('F j, Y', strtotime($event->start_date . (!empty( $event->timezone) ? ' ' . $event->timezone : '')));
			}
		}
		return $events;
	}

	protected function getAttendance($i = 1)
	{
		return [
			''			=> 'Select one...',
			'advisor'	=> 'National Advisory Board',
			'sponsor'	=> 'Conference Sponsor',
			'attendee'	=> 'Conference Attendee',
		];
	}

	protected function getDefaults($i = 1)
	{
		return (object)[
			'conference'	=> '',
			'attendance'	=> '',
			'email'			=> '',
			'phone'			=> '',
		];
	}

}
