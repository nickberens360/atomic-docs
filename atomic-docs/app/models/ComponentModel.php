<?php

/** @property $componentId int */

/**
 * Class ComponentModel
 * @property int componentId
 * @property string name
 * @property string description
 * @property int sort
 * @property string backgroundColor
 * @property bool hasJs
 * @property int categoryId
 * @property string slug
 */
class ComponentModel extends BaseModel {
	/** @var CategoryModel */
	private $category = null;
	public $oldSlug = null;

	public function __construct() {
		$this->_table = 'component';
		$this->_primaryKey = 'componentId';
		parent::__construct();
	}

	static public function deleteComp($key, $val) {
	}

	/**
	 * @return CategoryModel
	 */
	public function getCategory() {
		if ($this->category === null) {
			$this->category = new CategoryModel();
			if ($this->categoryId) {
				$this->category->loadById($this->categoryId);
			}
		}

		return $this->category;
	}

}
