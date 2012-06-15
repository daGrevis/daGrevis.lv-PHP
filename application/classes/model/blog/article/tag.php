<?php

/**
 * Model for article's tag.
 */
class Model_Blog_Article_Tag extends AutoModeler {

	/**
	 * Model name.
	 * 
	 * @var string
	 */
	static $model_name = 'Blog_Article_Tag';

	/**
	 * Table name.
	 * 
	 * @var string
	 */
	protected $_table_name = 'blog_article_tags';

	/**
	 * Table name.
	 * 
	 * @var string
	 */
	static $table_name = 'blog_article_tags';

	/**
	 * Table columns.
	 * 
	 * @var array
	 */
	protected $_data = array(
		'id' => '',
		'article_id' => '',
		'title' => '',
	);

	/**
	 * Validation rules.
	 * 
	 * @var array
	 */
	protected $_rules = array(
		'article_id' => array(
			array('digit'),
			array('positive'),
		),
		'title' => array(
			array('not_empty'),
			array('max_length', array(':value', 255)),
		),
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

	/**
	 * Gets tags by article ID.
	 * 
	 * @param  integer $article_id Article ID.
	 * @return array               Tags.
	 */
	static function get_tags_by_article_id($article_id) {

		$tags =
			DB::select('id', 'title')
				->from(self::$table_name)
				->where('article_id', '=', $article_id)
				->execute()
				->as_array()
				;

		return
			self::set_data_for_many(
				self::$model_name,
				$tags
			);

	}

	/**
	 * Gets title with hashtag prepended.
	 * 
	 * @return string Title.
	 */
	function get_title_with_hashtag() {

		return '#'.$this->title;

	}

}
