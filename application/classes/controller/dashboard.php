<?php

/**
 * @author daGrevis
 */
class Controller_Dashboard extends Controller_Template {

	function before() {

		parent::before();

		if (!A1::signed_in() && $this->request->action() !== 'sign_in') {

			$this->request->redirect('dashboard/sign_in');

		}

	}

	function action_sign_in() {

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

		Session::instance()
			->delete('signed_in')
			->regenerate()
			;

		$this->request->redirect('dashboard');

	}

	function action_index() {
	}

}