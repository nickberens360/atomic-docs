<?php
/**
 * File: Base.php
 * Date: 2019-02-08
 * Time: 09:04
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class BaseModel extends \DB\SQL\Mapper {
	protected $_table;
	protected $_primaryKey;

	public function __construct() {
		$db = \Base::instance()->get('db');
		parent::__construct($db, $this->_table);
	}

	/**
	 * Load by a given key => value pair
	 *
	 * @param $key
	 * @param $val
	 */
	public function loadBy($key, $val) {
		$filter = [$key . '=:key', ':key' => $val];

		$this->load($filter);
	}

	/**
	 * Load by the primary key of the table
	 *
	 * @param null $id
	 */
	public function loadById($id = null) {
		if (!$id) {
			return;
		}

		$this->loadBy($this->_primaryKey, $id);
	}

	/**
	 * Find by a key => value pair
	 *
	 * @param $key
	 * @param $val
	 * @return self[]
	 */
	public function findBy($key, $val) {
		$filter = [$key . '=:key', ':key' => $val];

		return $this->find($filter);
	}

}
