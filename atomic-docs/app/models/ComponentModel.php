<?php

/** @property $componentId int */

/**
 * Class ComponentModel
 * @property int $categoryId
 * @property int $name
 * @property int $hasJs
 * @property int $slug
 * @property int $sort
 * @property int $backgroundColor
 * @property int $componentId
 * @property int $fullScreen
 */
class ComponentModel extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'component');
	}


	static public function deleteComp( $key, $val ) {

	}

}