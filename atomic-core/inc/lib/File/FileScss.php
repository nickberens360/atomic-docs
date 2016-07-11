<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 11:19 AM
 */
require_once(Atomic::includePath() .'/inc/lib/File/FileHelper.php');

/**
 * Class FileScss
 */
class FileScss extends File {

	/**
	 * FileScss constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Create a [SCSS|LESS|SASS] file and add starter content
	 * Will then add the import statement in parent -> maybe break this out?
	 *
	 * @param        $filename
	 * @param        $category
	 * @param string $content
	 */
	public function create($filename, $category, $content = '') {
		$fullPath = $this->config['preCssDir'] . '/' . $category;
		$file = $filename . '.' . $this->config['preCssExt'];

		$fullFilePath = $fullPath . '/' . '_' . $file;

		$commentString = '/*' . $this->config['preCssDirectoryName'] . '/' . $category . '/_' . $file . '*/';
		$mainBody = "\n\n." . $filename . " {\n\n}";
		$content = $commentString . $mainBody;
		
		$created = parent::createFile($fullFilePath, $content);

		if (!$created['status']) {
			return $created;
		}

		return $this->writeImportStatement($filename, $category);

	}

	/**
	 * @param $category
	 *
	 * @return array
	 */
	public function createCategory($category) {
		$fullPath = $this->config['preCssDir'] . '/' . $category;
		$file = $category . '.' . $this->config['preCssExt'];

		$fullFilePath = $fullPath . '/' . $this->config['filenamePrefix'] . $file;

		$commentString = '/* You may rearrange the order of imports if necessary for your ' . $this->config['preCssExt'] . ' to compile*/';

		$created = parent::create($fullFilePath, $commentString);

		if (!$created['status']) {
			return $created;
		}

		$this->writeImportStatement($category);

		return array('status' => true, 'message' => 'Category created');

	}


	/**
	 * @param Full $filename
	 * @param      $directory
	 */
	public function remove($filename, $directory) {
		$fullPath = $this->config['preCssDir'] . '/' . $directory;
		$filename .= '.' . $this->config['preCssExt'];

		parent::removeFile($fullPath . '/' . $filename);
	}

	/**
	 * @param $component
	 * @param $category
	 *
	 * @return string
	 */
	public function open($component, $category) {
		$path = $this->pathScss($component, $category);

		return parent::openFile($path);
	}

	/**
	 * @TODO proper return of status message
	 *
	 * @param $filename
	 * @param $category
	 *
	 * @return array
	 */
	public function writeImportStatement($file, $category = null) {
		if( $category === null ){
			$importString = "@import " . '"' . $file . '/' . $file . '";';
			$importString = "\n$importString";

			$file = $this->config['preCssDir'] . '/' . 'main.' . $this->config['preCssExt'];

			parent::append($file, $importString);
		}
		else {
			$importString = "@import " . '"' . $file . '";';
			$importString = "\n$importString";

			$file = $this->config['preCssDir'] . '/' . $category . '/_' . $category . '.' . $this->config['preCssExt'];

			parent::append($file, $importString);
		}

		return array('status' => true, 'message' => 'Import added.');

	}
}