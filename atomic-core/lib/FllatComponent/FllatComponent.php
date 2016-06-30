<?php

require_once(dirname(__FILE__) . '/../../fllat.php');

class FllatComponent extends Fllat {
	protected $table = 'component';

	public function __construct() {
		parent::__construct();
		parent::init($this->table, $this->config['atomicCorePath'] . '/db');
	}

	public function select($cols) {
		return parent::select();
	}
	
	public function where($key, $val, $order = true) {
		$columns = array();

		$components = parent::where($columns, $key, $val);

		if( $order ) {
			return $this->order($components);
		}
		
		return $components;
	}
	
	/**
	 * Associative array of:
	 *  array(
	 *      'name' => $name,
	 *      'category' => $category,
	 *      '
	 *
	 * @param array $data
	 */
	public function add(array $data) {
		return parent::add($data);
	}

	public function rm($index = null) {
		if ($index !== null) {
			parent::rm($index);
		}
	}

	public function count(){
		return parent::count();
	}


//	public function update() {
//
//	}
//
//	public function delete() {
//
//	}

}