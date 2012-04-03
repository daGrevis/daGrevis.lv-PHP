<?php

/**
 * @daGrevis
 */
class Controller extends Kohana_Controller {

	protected $conventions;

	/**
	 * Loads conventions by directory's, controller's and action's names.
	 */
	protected function load_conventions() {

		$this->conventions = array();

		if ($this->request->directory()) {

			$this->conventions[] = $this->request->directory();

		}

		$this->conventions[] = $this->request->controller();
		$this->conventions[] = $this->request->action();

	}

	function before() {

		parent::before();

		$this->load_conventions();

		/**
		 * Loads permissions if they're found by conventions.
		 */

		$permissions = Kohana::$config->load('permissions');
		$permissions = $permissions->as_array();

		$found_permissions = array();

		// Loads directory's or controller's permissions.

		if (isset($permissions[$this->conventions[0]])) {

			$found_permissions = array_merge($found_permissions, Arr::get_non_assoc_elements($permissions[$this->conventions[0]]));

		}

		// Loads controller's or action's permissions.

		if (isset($permissions[$this->conventions[0]][$this->conventions[1]])) {

			$found_permissions = array_merge($found_permissions, Arr::get_non_assoc_elements($permissions[$this->conventions[0]][$this->conventions[1]]));

		}

		// Loads action's permissions when directory is not empty.

		if ($this->request->directory() && isset($permissions[$this->conventions[0]][$this->conventions[1]][$this->conventions[2]])) {

			$found_permissions = array_merge($found_permissions, Arr::get_non_assoc_elements($permissions[$this->conventions[0]][$this->conventions[1]][$this->conventions[2]]));

		}

		/**
		 * Executes all found permissions.
		 */

		if (!empty($found_permissions)) {

			foreach ($found_permissions as $permission) {

				if (!is_callable($permission)) {

					throw new HTTP_Exception_500("Permission must be callable!");

				}

				$response = call_user_func_array($permission, array());

				if (!$response) {

					throw new HTTP_Exception_401("You are not allowed to do that!");

				}

			}

		}

	}

}