<?php

class A1 {

	static function signed_in() {

		return (boolean)
			Session::instance()->get('signed_in');

	}

}