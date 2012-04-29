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

}