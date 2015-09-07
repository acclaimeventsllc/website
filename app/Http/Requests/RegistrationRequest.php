<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistrationRequest extends Request
{
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$step	= (int)\Session::get('registration.step');
		$step	= $step > 0 ? $step : 1;

		switch ($step)
		{
			case 5:
			case 4:
				return [
					'referral'		=> 'string',
				];
			case 3:
				return [
					'street'		=> 'required|string|max:255',
					'city'			=> 'required|string|max:255',
					'state'			=> 'required|string|max:255',
					'postal'		=> 'required|string|max:255',
				];
			case 2:
				return [
					'first_name'	=> 'required|string|max:255',
					'last_name'		=> 'required|string|max:255',
					'title'			=> 'required|string|max:255',
					'company'		=> 'required|string|max:255',
				];
			default:
				return [
					'conference'	=> 'required',
					'attendee'		=> 'required',
					'email'			=> 'required|email',
					'phone'			=> 'required|phone:US',
				];
		}
	}
}
