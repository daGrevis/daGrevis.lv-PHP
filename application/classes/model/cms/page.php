<?php

class Model_Cms_Page extends AutoModeler {

	protected $_table_name = 'cms_pages';
	static $table_name = 'cms_pages';

	protected $_data = array(
		'id' => '',
		'title' => '',
		'content' => '',
		'created' => '',
	);

	static function get_pages_for_list() {

		return
			DB::select('id', 'title')
				->from(self::$table_name)
				->execute()
				->as_array();

	}

}