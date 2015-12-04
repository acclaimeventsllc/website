<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use App\Models\Option;
use DB;

class Helpers {
	
	public static function routeinfo() {
		$route	= Route::current();
		if (preg_match("/conferences\/\{year\?\}\/\{conference\?\}/i", $route->uri()) && count($route->parameters()) > 0)
		{
			$action = 'conference';
		} elseif (preg_match("/\/(.+)/", $route->uri())) {
			list($action) = explode('/', $route->uri());
		} elseif ('/' === $route->uri()) {
			$action = 'home';
		} else {
			$action = $route->uri();
		}

//		dd((object)['action' => $action, 'params' => $route->parameters(), 'uri' => $route->uri()]);
		return (object)['action' => $action, 'params' => $route->parameters(), 'uri' => $route->uri()];
	}

	public static function options($route, $slug = null, $event = null)
	{
		$general	= Option::where('slug', '=', 'general')
							->where('published', '>', '0000-00-00 00:00:00')
							->get();

		$page		= Option::where('slug', '=', $route->action)
							->where('published', '>', '0000-00-00 00:00:00')
							->get();

		$general	= self::keysByField($general, 'option');
		$page		= self::keysByField($page, 'option');

		foreach ($general as $option => $values)
		{
			$options[$option] = $values->value;
		}

		foreach ($page as $option => $values)
		{
			$options[$option] = $values->value;
		}

		if (count($route->params) > 0 && $route->action === 'conference' && is_string($route->params['conference']) && is_string($route->params['year']))
		{
			$slug		= $route->params['year'].'/'.$route->params['conference'];
		} elseif (is_object($event) || is_array($event)) {
			$event		= (array)$event;
			$year		= date('Y', strtotime($event['startdate']));
			$conference	= $event['slug'];
			$slug		= $year.'/'.$conference;
		}

		if (is_string($slug))
		{
			$slug		= Option::where('slug', '=', $slug)
								->where('published', '>', '0000-00-00 00:00:00')
								->get();
			$slug		= self::keysByField($slug, 'option');

			foreach ($slug as $option => $values)
			{
				$options[$option] = $values->value;
			}
		}

		if (is_object($event))
		{
			$event = (array)$event;
		}

		if (is_array($event))
		{
			foreach ($options as $option => $value)
			{
				if (preg_match("/[a-z]+\:[a-z]+/i", $value))
				{
					list ($key, $val) = explode(':', $value);
					if (isset($event[$val]))
					{
						$obj = (object)$event[$val];
						if (!empty($obj->scalar))
						{
							$options[$option] = $obj->scalar;
						}
					}
				}
			}
		}

//		dd((object)$options);
		return (object)$options;
	}

	public static function navigation($route, $options = [], $sub = false) {
		if ($sub !== true) {
			$nav	= DB::table('navigations')
						->where('menu', '=', 'main')
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('priority')
						->get();

			if (!is_array($options)) {
				$options = [];
			}

			if (is_array($nav)) {
				foreach ($nav as $i => $item) {
					$shown = true;
				}
			}

			return $nav;
		} else {
			$nav	= DB::table('navigations')
						->where('menu', '=', $route->action)
						->where('published', '>', '0000-00-00 00:00:00')
						->orderBy('priority')
						->get();

			if (!is_array($options)) {
				$options = [];
			}

			if (is_array($nav)) {
				foreach ($nav as $i => $item) {
					if (!empty($item->options)) {
						// finish this
					}
				}
			}
			return $nav;
		}
	}

	public static function isNavItemShown($item, $options) {
		return !empty($options[$item->slug]) && $options[$item->slug] === true;
	}

	public static function keysByField($array, $field, $callback = null, $intoObj = false) {
		if (empty($field) || !is_string($field) || (!is_array($array) && !is_object($array))) return $array;
		foreach ($array as $key => $value) {
			if (is_object($value)) {
				if (!empty($value->exists)) {
					$value = (object)$value->toArray();
					$array[$value->$field] = $value;
				} else {
					$array[$value->$field] = $value;
				}
			} else {
				$array[$value[$field]] = $value;
			}

			if (is_callable($callback)) {
				$array[$value->$field] = $callback($value, $key, $field, $array, $intoObj);
			}

			unset($array[$key]);
		}

		if ($intoObj === true) {
			return (object)$array;
		}
		return $array;
	}

	public static function serialize($data) {
		return base64_encode(serialize($data));
	}

	public static function unserialize($data) {
		return unserialize(base64_decode($data));
	}

	public static function isSerialized($data) {
		if (!is_string($data)) {
			return false;
		}

		$data = trim(base64_decode($data));

		if (strlen($data) < 4) {
			return false;
		} elseif (':' !== $data[1]) {
			return false;
		}

		if ($data[0] === 's') {
			if (';' !== substr($data, -1)) {
				return false;
			}
			if ('"' !== substr($data, -2, 1)) {
				return false;
			}
		} elseif ($data[0] === 'a') {
			if (';}' !== substr($data, -2)) {
				return false;
			}
			if ('"' !== substr($data, -7, 1)) {
				return false;
			}
		} else {
			return false;
		}

		return true;
	}

}