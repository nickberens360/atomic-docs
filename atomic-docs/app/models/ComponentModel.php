<?php

/** @property $componentId int */

class ComponentModel extends DB\SQL\Mapper{

	public function __construct(DB\SQL $db) {
		parent::__construct($db,'component');
	}


}