<?php

/**
 * Model for blog's article.
 */
class Model_Blog_Article extends AutoModeler {

	/**
	 * Model name.
	 * 
	 * @var string
	 */
	static $model_name = 'Blog_Article';

	/**
	 * Table name.
	 * 
	 * @var string
	 */
	protected $_table_name = 'blog_articles';

	/**
	 * Table name.
	 * 
	 * @var string
	 */
	static $table_name = 'blog_articles';

	protected $_data = array(
		'id' => '',
		'title' => '',
		'slug' => '',
		'content' => '',
		'created' => '',
		'last_updated' => '',
		'show_time_of_last_edit' => '',
		'is_published' => '',
	);

	/**
	 * Validation filters.
	 * 
	 * @var array
	 */
	protected $_filters = array(
		'title' => array(
			array('trim'),
		),
		'is_published' => array(
			array('Form::checkboxs_on_to_one')
		),
	);

	/**
	 * Validation rules.
	 * 
	 * @var array
	 */
	protected $_rules = array(
		'title' => array(
			array('not_empty'),
			array('max_length', array(':value', 255)),
		),
		'content' => array(
			array('not_empty'),
			array('max_length', array(':value', 65535)),
		),
		'is_published' => array(
			array('range', array(':value', 0, 1))
		),
	);

	/**
	 * Condition that article is published.
	 * 
	 * @return Database_Query_Builder_Select
	 */
	function published() {

		return
			DB::select()->where(
				'is_published',
				'=',
				1
			);

	}

	function get_articles($limit = null, $offset = null) {

		$limit === null ?: $this->limit($limit);
		$offset === null ?: $this->offset($offset);

		return
			$this
				->order_by('id', 'desc')
					->find_all()
					;

	}

	function get_all_published_articles($limit = null, $offset = null) {

		return
			$this->load(
				DB::select('id', 'slug', 'title', 'content', 'created')
					->published()
					->limit($limit)
					->offset($limit)
					->order_by('id', 'desc')
			);

	}

	/**
	 * Gets count of all published articles.
	 * 
	 * @return integer Count of articles.
	 */
	function get_count_of_published_articles() {

		$count =
			$this
				->published()
				->count_all()
				;

		return (integer)$count;

	}

}