<?php

class Model_Blog_Article extends ORM {

	protected $_created_column = array(
		'column' => 'created',
		'format' => true,
	);

	protected $_updated_column = array(
		'column' => 'last_updated',
		'format' => true,
	);

	function filters() {
		
		return array(
			'title' => array(
				array('trim'),
			),
			'show_time_of_last_edit' => array(
				array('Form::checkboxs_on_to_one')
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
			'show_time_of_last_edit' => array(
				array('range', array(':value', 0, 1))
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

}