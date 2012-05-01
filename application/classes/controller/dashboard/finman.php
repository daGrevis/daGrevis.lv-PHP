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

	function action_add_item() {

		$categories = Model_Finman_Category::get_categories();

		if ($this->request->method() === Request::POST) {

			$item = AutoModeler::factory('Finman_Item');

			$item->category_id = $this->request->post('category_id');
			$item->title = $this->request->post('title');
			$item->description = $this->request->post('description');
			$item->price = $this->request->post('price');

			$item->save();

			$this->request->redirect('dashboard/finman');

		}

		$this->view
			->set('categories', $categories)
			;

	}

}