<?php

class Controller_Dashboard extends Controller_Template {

	function before() {

		parent::before();

		if (!A1::signed_in() && !in_array($this->request->action(), array('sign_in', 'sign_out'))) {

			$this->request->redirect('dashboard/sign_in');

		}

	}

	function action_sign_in() {

		if (A1::signed_in()) {

			throw new HTTP_Exception_401("You are already signed-in!");

		}

		$attempt = ORM::factory('Attempt');

		$attempt->purge_attempts(Request::$client_ip);

		if ($this->request->method() === Request::POST) {

			if (!Security::check($this->request->post('csrf_token'))) {

				throw new HTTP_Exception_401("Bad token!");

			}

			if (
				$attempt->check_attempts(Request::$client_ip) &&
				$attempt->check_password($this->request->post('password'))
			) {

				$attempt->purge_attempts(Request::$client_ip, true);

				Session::instance()
					->set('signed_in', true)
					->regenerate()
					;

				$this->request->redirect('dashboard');

			}

			$attempt->add_attempt(Request::$client_ip);

			$this->view->errors = true;

		}
		
	}

	function action_sign_out() {

		if (!A1::signed_in()) {

			throw new HTTP_Exception_401("You must be signed-in!");

		}

		Session::instance()
			->delete('signed_in')
			->regenerate()
			;

		$this->request->redirect('dashboard');

	}

	function action_index() {
	}

}