<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Models\Conference;

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
		$conferences	= Conference::all();
		$in				= 'in:';
		foreach ($conferences as $i => $event)
		{
			$event = (object)$event->toArray();
			$in .= ($i === 0 ? '' : ',') . $event->slug;
		}

		return [
			'conference'		=> 'required|'.$in,
			'attendance'		=> 'required|in:advisor,sponsor,attendee',
			'email'				=> 'required|email',
			'phone'				=> 'required|phone:US',
			'first_name'		=> 'required|string|max:255',
			'last_name'			=> 'required|string|max:255',
			'title'				=> 'required|string|max:255',
			'company'			=> 'required|string|max:255',
			'affiliation'		=> 'in:tagitm',
			'street'			=> 'required|string|max:255',
			'city'				=> 'required|string|max:255',
			'state'				=> 'required|in:AL,AK,AZ,AR,CA,CO,CT,DE,DC,FL,GA,HI,ID,IL,IN,IA,KS,KY,LA,ME,MD,MA,MI,MN,MS,MO,MT,NE,NV,NH,NJ,NM,NY,NC,ND,OH,OK,OR,PA,RI,SC,SD,TN,TX,UT,VT,VA,WA,WV,WI,WY',
			'postal'			=> 'required|string|max:255',
		];
	}


}
