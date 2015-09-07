<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;
use DB;

class Helpers {
	
	public static function routeinfo() {
		$route	= Route::current();
		if (preg_match("/\//", $route->uri())) {
			list($action) = explode('/', $route->uri());
		} elseif ('/' === $route->uri()) {
			$action = 'home';
		} else {
			$action = $route->uri();
		}
		return (object)['action' => $action, 'params' => $route->parameters(), 'uri' => $route->uri()];
	}

	public static function options($route, $slug = null, $local = [], $vars = []) {

		$options	= DB::table('options')
						->where('published', '>', '0000-00-00 00:00:00')
						->get();
		$options	= self::keysByField($options, 'option', function($value, $key, $field, $array, $toObj) {
							if (is_object($value)) {
								return $value->value;
							} elseif (is_array($value)) {
								return $value['value'];
							} else {
								return $value;
							}
						});

		if (is_string($slug)) {
			$route->action = $slug;
		} elseif (empty($route->action)) {
			$route->action = 'home';
		}

		$page		= DB::table('pages')
						->where('slug', '=', $route->action)
						->where('published', '>', '0000-00-00 00:00:00')
						->take(1)
						->get();
		if (is_array($page) && isset($page[0])) {
			$page		= $page[0];
		}

		if (isset($page) && !empty($page->options)) {
			$page->options	= self::unserialize(trim($page->options));
		} else {
			$page			= (object)['options' => ''];
		}

		if (!empty($page->options)) {
			foreach ($page->options as $option => $value) {
				$options[$option] = $value;
			}
		}

		if (is_array($local)) {
			foreach ($local as $option => $value) {
				$options[$option] = $value;
			}
		}

		if (is_array($vars) && count($vars) > 0) {
			foreach ($options as $option => $value) {
				if (is_string($value) && preg_match("/^([a-z]+):([a-z]+)$/i", $value)) {
					list($key, $val) = explode(':', $value);
					if (isset($vars[$key])) {
						$obj = (object)$vars[$key];
						if (!empty($obj->$val)) {
							$options[$option] = $obj->$val;
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