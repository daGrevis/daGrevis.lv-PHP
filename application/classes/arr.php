<?php

class Arr extends Kohana_Arr {

	/**
	 * Gets non-associative elements from given array.
	 */
	static function get_non_assoc_elements(array $array) {

		return array_filter($array, function($element) {

			return !is_array($element);

		});

	}

}