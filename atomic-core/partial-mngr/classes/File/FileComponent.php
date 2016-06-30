<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 2:07 PM
 */
require_once 'File.php';

class FileComponent extends File {

	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create a PHP component file and add starter content
	 * @param        $filename
	 * @param        $directory
	 * @param string $content
	 */
	public function create($file, $directory, $content = '') {
		$fullPath = $this->config['componentDirectory'] . '/' . $directory;
		$filename = $file .'.'. $this->config['componentExt'];

		$fullFilePath = $fullPath .'/'. $filename;


		$create = parent::createFile($fullFilePath, $content);

		return $create;
	}

	public function open($component, $category){
		$path = parent::pathPhp($component, $category);

		return parent::openFile($path);
	}

	public function remove($filename, $directory){
		$fullPath = $this->config['preCssDir'] . '/' . $directory;
		$filename .= '.'. $this->config['preCssExt'];

		parent::removeFile($fullPath.'/'.$filename);
	}

}