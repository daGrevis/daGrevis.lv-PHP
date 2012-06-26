<?php

/**
 * Improvments to exception handler.
 */
class Kohana_Exception extends Kohana_Kohana_Exception {

	static function handler(Exception $e) {

		if (Kohana::is_development()) {

			parent::handler($e);

		} else {

			try {

				Kohana::$log->add(Log::ERROR, parent::text($e));

				$action =
					$e instanceof HTTP_Exception
					? $e->getCode()
					: 500
					;

				echo
					Request::factory(Route::get('error')->uri(array('action' => $action)))
						->execute()
						->send_headers()
						->body()
						;

			} catch (Exception $e) {
			}

		}

	}

}
