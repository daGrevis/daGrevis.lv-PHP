<?php

/**
 * Controller for CMS' pages.
 */
class Controller_Page extends Controller_Template {

	/**
	 * Displays page.
	 */
	function action_display() {

		$page_id = $this->request->param('id');

		$page = AutoModeler::factory('Cms_Page', $page_id);

		if (!$page->loaded()) {

			throw new HTTP_Exception_404("Page was not found!");

		}

		var_dump($page->as_array());
		exit;

	}

}