<?php

require_once(Atomic::includePath() .'/inc/lib/fllat.php');

/**
 * Class FllatComponent
 */
class FllatComponent extends Fllat {
	/**
	 * @var string
	 */
	protected $table = 'component';

	/**
	 * FllatComponent constructor.
	 */
	public function __construct() {
		parent::__construct();
		parent::init($this->table, $this->config['atomicCorePath'] . '/db');
	}

	/**
	 * @param array $cols
	 *
	 * @return array
	 */
	public function select($cols) {
		return parent::select();
	}
	
	/**
	 * @param array  $key
	 * @param string $val
	 * @param bool   $order
	 *
	 * @return array
	 */
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

	/**
	 * @param null $index
	 */
	public function rm($index = null) {
		if ($index !== null) {
			parent::rm($index);
		}
	}

	/**
	 * @return int
	 */
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