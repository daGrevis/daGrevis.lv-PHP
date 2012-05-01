<?php

class Model_Finman_Item extends AutoModeler {

	protected $_table_name = 'finman_items';
	static $table_name = 'finman_items';

	protected $_data = array(
		'id' => '',
		'category_id' => '',
		'title' => '',
		'description' => '',
		'price' => '',
		'created' => '',
		'last_updated' => '',
	);

	static function get_items() {

		return
			DB::select(
				self::$table_name.'.id',
				self::$table_name.'.title',
				self::$table_name.'.price',
				self::$table_name.'.category_id',
				'finman_categories.title'
			)
				->from(self::$table_name)
				->join('finman_categories')
				->on('finman_categories.id', '=', self::$table_name.'.category_id')
				->execute()
				->as_array();

	}

}