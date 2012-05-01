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

	function save($validation = null) {

		$this->price *= 100;

		if (!$this->loaded()) {

			$this->created = time();

		}

		parent::save($validation);

	}

	function save_multiple($count) {

		$query =
			DB::insert($this->_table_name)
				->columns(array_keys($this->_data))
				;

		$data = $this->_data;
		$data['price'] *= 100;

		for ($i = 0; $i < $count; ++$i) {

			$query->values($data);

		}

		$query->execute();

	}

	static function get_count() {

		return (integer)
			DB::select(array(DB::expr('COUNT(*)'), 'count'))
				->from(self::$table_name)
				->join('finman_categories')
				->on('finman_categories.id', '=', self::$table_name.'.category_id')
				->execute()
				->get('count')
				;

	}

	static function get_items($limit = null, $offset = null) {

		$query =
			DB::select(
				self::$table_name.'.id',
				self::$table_name.'.title',
				self::$table_name.'.price',
				self::$table_name.'.category_id',
				array('finman_categories.title', 'category')
			)
				->from(self::$table_name)
				->join('finman_categories')
				->on('finman_categories.id', '=', self::$table_name.'.category_id')
				->order_by('id', 'desc')
				;

		$limit === null ?: $query->limit($limit);
		$offset === null ?: $query->offset($offset);

		$result = $query->execute();

		return
			$result->as_array();

	}

}