<?php

require_once(Atomic::includePath() . '/inc/lib/Atomic.php');
require_once dirname(__FILE__) . '/File/FileScss.php';
require_once dirname(__FILE__) . '/File/FileCategory.php';
require_once(dirname(__FILE__) . '/../../fllat.php');
require_once(dirname(__FILE__) . '/../lib/FllatCategory/FllatCategory.php');
require_once dirname(__FILE__) . '/Atomic.php';

class Category extends Atomic {

	private $errors;
	private $data;

	public function __construct() {
		parent::__construct();

		$this->errors = array();
		$this->data = array();
	}

	function create($category) {
		$fullFilePath = $this->config['categoryDirectory'] . '/' . $category;

		$FileCategory = new FileCategory();
		$FileScss = new FileScss();

		$created = $FileCategory->mkdir($category);
		$scss = $FileScss->createCategory($category);


		if ($scss['status'] && $created['status']) {

//			$File = new File();
//			$File->append($this->config['categoryDirectory'] . '/' . $category . '/' . $category . '.' . $this->config['componentExt'], $includeString);

			$db = new FllatCategory();

			$status = $db->add(array('category' => $category, 'order' => $this->getCount()));

			return array('status' => true, 'message' => 'Successful');
		}
		else {
			return !$created['status'] ? $created : $scss;
		}
	}

	function getCount(){
		$FllatCategory = new FllatCategory();
		return $FllatCategory->getCount();
	}

	/**
	 * Remove a file
	 * @param $file Full path and filename of file to be removed
	 */
	function remove($file){
		unlink($file);
	}

}