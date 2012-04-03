<?php

class Model_Attempt extends ORM {

	const MAX_ATTEMPTS = 10;
	CONST TIME_INTERVAL = 300;

	protected $_created_column = array(
		'column' => 'created',
		'format' => true,
	);

	function by_ip($ip) {

		$this->where('ip', '=', $ip);

		return $this;

	}

	function by_created($time_interval) {

		$this->where('created', '<', time() - self::TIME_INTERVAL);

		return $this;

	}

	function check_attempts($ip) {

		$attempts =
			$this->by_ip(ip2long($ip))
				->count_all();

		return self::MAX_ATTEMPTS > $attempts;

	}

	function check_password($password) {

		$global_password = Kohana::$config->load('secrets.global_password');

		return $global_password === $password;
		
	}

	function add_attempt($ip) {

		$this->ip = ip2long($ip);

		$this->save();

	}

	function purge_attempts($ip, $force_all = false) {

		$query =
			DB::delete($this->_table_name)
				->where('ip', '=', ip2long($ip));

		if (!$force_all) {

			$query->where('created', '<', time() - self::TIME_INTERVAL);

		}

		$query->execute();

	}

}