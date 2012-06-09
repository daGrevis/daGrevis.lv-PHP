<?php

class Controller_Dashboard_Finman extends Controller_Template {

	const ITEMS_PER_PAGE = 10;

	function action_index() {

		$count = Model_Finman_Item::get_count();

		$pagination = Pagination::factory(array(
			'total_items' => $count,
			'items_per_page' => self::ITEMS_PER_PAGE,
		));

		if ($count) {

			$items = Model_Finman_Item::get_items($pagination->get_limit(), $pagination->get_offset());
			$items = AutoModeler::set_data_for_many('Finman_Item', $items);

		} else {

			$items = array();

		}

		$this->view
			->set('items', $items)
			->set('pagination', $pagination)
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

			$count = $this->request->post('count');

			if ($count > 1) {

				$item->save_multiple($count);

			} else {

				$item->save();

			}

			$this->request->redirect('dashboard/finman');

		}

		$this->view
			->set('categories', $categories)
			;

	}

}