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
		parent::init($this->table, $this->config['atomicCorePath'] . '/db');
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
	
	/**
	 * @return array
	 */
	public function select() {
		$categories = parent::select();

		return $this->order($categories);
	}


//	public function update() {
//
//	}
//
//	public function delete() {
//
//	}

}