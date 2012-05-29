<?php

class URL extends Kohana_URL {

	static function asset($path) {

		return self::site('assets/'.$path);

	}

	static function stylesheet($path) {

		return self::asset('stylesheets/'.$path);

	}

	static function script($path) {

		return self::asset('scripts/'.$path);

	}

	static function image($path) {

		return self::asset('images/'.$path);

	}

	static function dashboard($path = null) {

		if ($path !== null) {

			return self::site('dashboard/'.$path);

		} else {

			return self::site('dashboard');

		}

	}

	static function current() {

		return self::site(Request::current()->uri());

	}
	
}