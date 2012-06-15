<?php

/**
 * Few more validation rules.
 */
class Valid extends Kohana_Valid {

	/**
	 * Checks that number is positive (1, 2, 3, ...).
	 * 
	 * @param  string  $number Number.
	 * @return boolean         Is or is NOT positive?
	 */
	static function positive($number) {

		return $number > 0;

	}

}
