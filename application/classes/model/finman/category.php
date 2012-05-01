<?php

class Model_Finman_Category extends AutoModeler {

	protected $_table_name = 'finman_categories';
	static $table_name = 'finman_categories';

	protected $_data = array(
		'id' => '',
		'title' => '',
		'description' => '',
		'created' => '',
		'last_updated' => '',
	);

	function save($validation = null) {

		if (!$this->loaded()) {

			$this->created = time();

		}

		parent::save($validation);

	}

	static function get_categories() {

		return
			DB::select('id', 'title')
				->from(self::$table_name)
				->execute()
				->as_array();

	}

}