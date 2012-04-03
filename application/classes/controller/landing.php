<?php

class Controller_Landing extends Controller_Template {

	function action_index() {

		$this->view->list = Request::factory('article/list')->execute();

	}

}