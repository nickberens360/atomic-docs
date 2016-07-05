<?php

require_once(Atomic::includePath() .'/inc/lib/fllat.php');

class FllatCategory extends Fllat {
	protected $table = 'category';

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

	public function rm($index = null) {
		if ($index !== null) {
			parent::rm($index);
		}
	}

	public function count(){
		return parent::count();
	}

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