<?php

/**
 * Few adjustments to Pagination module.
 */
class Pagination extends Kohana_Pagination {

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