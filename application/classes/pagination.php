<?php

/**
 * Few adjustments to Pagination module.
 */
class Pagination extends Kohana_Pagination {

	/**
	 * @fixme Doesn't work!
	 * 
	 * @var array
	 */
	protected $config = array(
		'current_page' => array(
			'source' => 'query_string',
			'key' => 'page',
		),
		'total_items' => 0,
		'items_per_page' => 10,
		'view' => 'pagination',
		'auto_hide' => false,
		'first_page_in_url' => false,
	);

	/**
	 * Helper: gets limit.
	 * 
	 * @return string Limit.
	 */
	function get_limit() {

		return $this->items_per_page;

	}

	/**
	 * Helper: gets offset.
	 * 
	 * @return string Limit.
	 */
	function get_offset() {

		return $this->offset;

	}

}