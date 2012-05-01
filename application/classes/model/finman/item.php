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

}