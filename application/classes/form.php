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

}