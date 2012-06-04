<?php

/**
 * Nasty hacks that are against any rules, but solves a lot of problems and gives improvments to development time.
 */
class AutoModeler extends AutoModeler_Core {

	/**
	 * Sets data and changes state to loaded.
	 * 
	 * @param  array Data
	 * @return $this
	 */
	function set_data(array $data) {

		$this->_data = $data;
		$this->state(AutoModeler::STATE_LOADED);

		return $this;

	}

	/**
	 * Loops through given array of data and inits AutoModeler object for each entry with given data and state set to loaded.
	 * 
	 * @param  string Model
	 * @param  array  Entries
	 * @return array  Entries (each entry is AutoModeler object now)
	 */
	static function set_data_for_many($model, array $entries) {

		if (!$entries) {

			return array();

		}

		foreach ($entries as &$entry) {

			$entry = AutoModeler::factory($model)->set_data($entry);

		}

		return $entries;

	}

	/**
	 * Helper: Provides that only meant database fields are changed.
	 * 
	 * @param  array              $fields   Fields (key, value pairs)
	 * @param  array              $expected Changeable fields (just keys)
	 * @throws HTTP_Exception_400           If any key of 1st array is not found in 2nd array, but is table column
	 */
	function check_fields($fields, $changeable) {

		$field_keys = array_keys($fields);
		$column_keys = array_keys($this->_data);

		foreach ($field_keys as $key) {

			if (is_array($fields[$key])) {

				$this->check_fields($fields[$key], $changeable[$key]);

			}

			if (!in_array($key, $changeable) && in_array($key, $column_keys)) {

				throw new HTTP_Exception_400("Trying to change database fields that aren't meant to be changed!");

			}

		}

	}

}