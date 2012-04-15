<?php

class AutoModeler extends AutoModeler_Core {

	/**
	 * Sets data and changes state to loaded.
	 * 
	 * @param array Data
	 */
	function set_data(array $data) {

		$this->_data = $data;

		$this->_state = AutoModeler::STATE_LOADED;

	}

}