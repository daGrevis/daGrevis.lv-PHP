<?php

class Kohana extends Kohana_Core {
	
	/**
	 * Checks that environment is development.
	 * 
	 * @return boolean
	 */
	static function is_development() {

		return self::$environment === self::DEVELOPMENT;

	}

	/**
	 * Checks that environment is production.
	 * 
	 * @return boolean
	 */
	static function is_production() {

		return self::$environment === self::PRODUCTION;

	}

}