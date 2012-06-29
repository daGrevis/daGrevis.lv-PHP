<?php

class Model_Blog_Article extends ORM {

	static $table_name = 'blog_articles';

	protected $_created_column = array(
		'column' => 'created',
		'format' => true,
	);

	function filters() {

		return array(
			'title' => array(
				array('trim'),
			),
			'tweet_id' => array(
				array('trim'),
			),
			'is_published' => array(
				array('Form::checkboxs_on_to_one')
			),
		);

	}

	function rules() {

		return array(
			'title' => array(
				array('not_empty'),
				array('max_length', array(':value', 255)),
			),
			'content' => array(
				array('not_empty'),
				array('max_length', array(':value', 65535)),
			),
			'tweet_id' => array(
				array('max_length', array(':value', 255)),
				array('digit'),
			),
			'is_published' => array(
				array('range', array(':value', 0, 1))
			),
		);

	}

	function published() {

		return
			$this->where(
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

		$limit === null ?: $this->limit($limit);
		$offset === null ?: $this->offset($offset);

		return
			$this
				->published()
				->order_by('id', 'desc')
					->find_all()
					;

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
