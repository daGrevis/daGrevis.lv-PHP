<?php

/**
 * Useful utilities.
 */
class Utility {
	
	static function to_boolean($value) {

		return (boolean)$value;

	}

	static function to_integer($value) {

		return (integer)$value;

	}

	static function to_string($value) {

		return (string)$value;

	}

	static function to_array($value) {

		return (array)$value;

	}

	static function to_object($value) {

		return (object)$value;

	}

}