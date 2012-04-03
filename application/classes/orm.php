<?php

class ORM extends Kohana_ORM {

	function exist($pk) {

		return (boolean)
			DB::select($this->_primary_key)
				->from($this->_table_name)
				->where($this->_primary_key, '=', $pk)
				->execute()
				->get($this->_primary_key);

	}

	function blind_delete($pk) {

		return
			DB::delete($this->_table_name)
				->where($this->_primary_key, '=', $pk)
				->execute();

	}

}