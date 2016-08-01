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
		parent::init($this->table);
	}

	/**
	 * @param array $cols
	 *
	 * @return array
	 */
	public function select($cols) {
		return parent::select($cols);
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


	public function update($component, array $data, $where = array()) {
		$index = parent::index('component', $component);
		$row = $this->where('component', $where['component']);

		foreach($data as $key => $val) {
			$row[$key] = $val;
		}

		if( $index ) {
			return parent::update($index, $row);
		}
		else {
			return array('status' => false, 'message' => 'Component not found. '. $component);
		}
	}

//
//	public function delete() {
//
//	}

}