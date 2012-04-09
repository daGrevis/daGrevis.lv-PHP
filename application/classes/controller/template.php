<?php

class Controller_Template extends Controller {

	protected
		$conventions,
		$view,
		$stylesheets,
		$scripts;

	function before() {

		parent::before();

		/**
		 * Loads view if it's found by conventions.
		 */

		$t = implode('/', $this->conventions);

		if (Kohana::find_file('views', $t)) {

			$this->view = View::factory($t);

		}

		unset($t);

		/**
		 * Loads stylesheets if they're found by conventions.
		 */

		$this->stylesheets = array();

		// Loads directory's or controller's stylesheet.

		if (file_exists('assets/stylesheets/'.$this->conventions[0].'.css')) {

			$this->stylesheets[] = $this->conventions[0];

		}

		// Loads controller's or action's stylesheet.

		if (file_exists('assets/stylesheets/'.$this->conventions[0].'/'.$this->conventions[1].'.css')) {

			$this->stylesheets[] = $this->conventions[0].'/'.$this->conventions[1];

		}

		// Loads action's stylesheets when directory is not empty.

		if ($this->request->directory()) {

			if (file_exists('assets/stylesheets/'.$this->conventions[0].'/'.$this->conventions[1].'/'.$this->conventions[2].'.css')) {

				$this->stylesheets[] = $this->conventions[0].'/'.$this->conventions[1].'/'.$this->conventions[2];

			}

		}

		/**
		 * Loads scripts if they're found by conventions.
		 */

		$this->scripts = array();

		// Loads directory's or controller's script.

		if (file_exists('assets/scripts/'.$this->conventions[0].'.js')) {

			$this->scripts[] = $this->conventions[0];

		}

		// Loads controller's or action's script.

		if (file_exists('assets/scripts/'.$this->conventions[0].'/'.$this->conventions[1].'.js')) {

			$this->scripts[] = $this->conventions[0].'/'.$this->conventions[1];

		}

		// Loads action's script when directory is not empty.

		if ($this->request->directory()) {

			if (file_exists('assets/scripts/'.$this->conventions[0].'/'.$this->conventions[1].'/'.$this->conventions[2].'.js')) {

				$this->scripts[] = $this->conventions[0].'/'.$this->conventions[1];

			}

		}

	}

	function after() {

		/**
		 * Renders view if it was found previously.
		 */

		if (!empty($this->view)) {

			/**
			 * Renders view with template only when it's external request (not HMVC).
			 */

			if ($this->request->is_initial()) {

				$template =
					View::factory('template')
						->set('body', $this->view)
						->set('scripts', $this->scripts)
						->set('stylesheets', $this->stylesheets)
						;

				if (!empty($this->title)) {

					$template->title = $this->title;

				}

				$this->response->body($template);

			} else {

				$this->response->body($this->view);

			}

		}

		parent::after();

	}

}