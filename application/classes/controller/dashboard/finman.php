<?php

class Controller_Dashboard_Finman extends Controller_Template {

	function action_index() {

		$items = Model_Finman_Item::get_items();
		$items = AutoModeler::set_data_for_many('Finman_Item', $items);

		$this->view
			->set('items', $items)
			;

	}

	function action_add_category() {

		if ($this->request->method() === Request::POST) {

			$category = AutoModeler::factory('Finman_Category');

			$category->title = $this->request->post('title');
			$category->description = $this->request->post('description');

			$category->save();

			$this->request->redirect('dashboard/finman');

		}

	}

}