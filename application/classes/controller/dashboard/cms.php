<?php

/**
 * Controller for managing CMS.
 */
class Controller_Dashboard_Cms extends Controller_Template {

	/**
	 * Lists pages.
	 */
	function action_list() {

		$pages = Model_Cms_Page::get_pages_for_list();
		$pages = AutoModeler::set_data_for_many('Cms_Page', $pages);

		$this->view
			->set('pages', $pages)
			;

	}

	/**
	 * Edits page.
	 */
	function action_edit() {

		$page_id = $this->request->param('id');

		if (!$page_id) {

			throw new HTTP_Exception_400("Page ID must be set!");

		}

		$page = AutoModeler::factory('Cms_Page', $page_id);

		if (!$page->loaded()) {

			throw new HTTP_Exception_404("Page was not found!");

		}

		if ($this->request->method() === Request::POST) {

			if (!Security::check($this->request->post('csrf_token'))) {

				throw new HTTP_Exception_401("Bad token!");

			}

			$this->request->redirect('dashboard/cms/edit/'.$page->id);

		}

		$this->view
			->set('page', $page)
			;

	}

}