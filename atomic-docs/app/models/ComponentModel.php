<?php

/** @property $componentId int */

/**
 * Class ComponentModel
 * @property int $categoryId
 */
class ComponentModel extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'component');
	}


	static public function deleteComp( $key, $val ) {

	}

}