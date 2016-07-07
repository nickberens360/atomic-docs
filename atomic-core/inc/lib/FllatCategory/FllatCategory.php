<?php

require_once(Atomic::includePath() .'/inc/lib/fllat.php');

/**
 * Class FllatCategory
 */
class FllatCategory extends Fllat {
	/**
	 * @var string
	 */
	protected $table = 'category';
	
	/**
	 * FllatCategory constructor.
	 */
	public function __construct() {
		parent::__construct();
		parent::init($this->table);
	}

	/**
	 * @return array
	 */
	public function select() {
		$categories = parent::select();

		return $this->order($categories);
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

		$categories = parent::where($columns, $key, $val);

		if( $order ) {
			return $this->order($categories);
		}

		return $categories;
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