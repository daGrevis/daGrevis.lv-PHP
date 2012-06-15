<?php

class Model_Blog_Tag extends AutoModeler {

	protected $_table_name = 'blog_tags';
	static $table_name = 'blog_tags';

	protected $_data = array(
		'id' => '',
		'article_id' => '',
		'title' => '',
	);

	/**
	 * Checks tags against validation rules.
	 * 
	 * @param  array $tags Tags.
	 * @return mixed       Boolean `true` or validation's errors.
	 */
	function check_multiple(array $tags) {
	}

	/**
	 * Saves tags.
	 * 
	 * @param  array $tags Tags.
	 * @return void
	 */
	function save_multiple(array $tags) {
	}

	/**
	 * Deletes by article ID.
	 * 
	 * @param  integer $article_id Article ID.
	 * @return void
	 */
	function delete_by_article_id($article_id) {
	}

}
