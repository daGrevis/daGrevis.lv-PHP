<?php

class ORM extends Kohana_ORM {

	protected $other_columns_to_select = array();

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

	/**
	 * If you don't need all columns -- this method allows you to select only the needed ones.
	 *
	 * @auhtor daGrevis
	 */
	protected function select_other($columns = array()) {

		$this->other_columns_to_select = array_unique(array_merge($this->other_columns_to_select, $columns));

		return $this;

	}

	/**
	 * This is very bad, but there weren't any other way! Overwrites method.
	 * 
	 * @auhtor daGrevis
	 */
	protected function _load_result($multiple = false) {

		$this->_db_builder->from(array($this->_table_name, $this->_object_name));

		if ($multiple === false) {

			$this->_db_builder->limit(1);

		}

		if (!$this->other_columns_to_select) {

			$this->_db_builder->select($this->_object_name.'.*');

		} else {

			$t = $this->other_columns_to_select;

			// Prepends object name to each column.
			
			foreach ($t as &$column) {

				$column = $this->_object_name.".$column";

			}

			$this->_db_builder->select_array($t);

			unset($t);

		}

		if (!isset($this->_db_applied['order_by']) && !empty($this->_sorting)) {

			foreach ($this->_sorting as $column => $direction) {

				if (strpos($column, '.') === false) {

					$column = $this->_object_name.'.'.$column;

				}

				$this->_db_builder->order_by($column, $direction);

			}

		}

		if ($multiple === true) {

			$result = $this->_db_builder->as_object(get_class($this))->execute($this->_db);

			$this->reset();

			return $result;

		} else {
			
			$result = $this->_db_builder->as_assoc()->execute($this->_db);

			$this->reset();

			if ($result->count() === 1) {

				$this->_load_values($result->current());

			} else {

				$this->clear();

			}

			return $this;

		}

	}

}