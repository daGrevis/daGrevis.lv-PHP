<?php

class Form extends Kohana_Form {
	
	/**
	 * Converts “on” to “1“ for easier working with checkboxes.
	 * 
	 * @param  string  Value
	 * @return integer Zero or one
	 */
	static function checkboxs_on_to_one($value) {

		if ($value === 'on') {

			return 1;

		} else {

			return $value;

		}
		
	}

	/**
	 * Helper for creating token as hidden input. With using default params it's just simple CSRF token.
	 */
	static function token($name = 'csrf_token', $token = null) {

		$token =
			$token !== null
				? $token
				: Security::token()
				;

		return Form::hidden($name, $token);

	}

}