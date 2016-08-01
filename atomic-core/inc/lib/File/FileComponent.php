<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 2:07 PM
 */
require_once 'FileHelper.php';

/**
 * Class FileComponent
 */
class FileComponent extends File {

	/**
	 * FileComponent constructor.
	 */
	public function __construct() {
		parent::__construct();
	}

	public function getCommentString($component, $category) {
		return '<!--' . $this->config['categoryDirectoryName'] . '/' . $category . '/' . $component . '-->';
	}

	public function updateCommentString($old, $new, $category) {
		require_once(Atomic::includePath() . '/inc/lib/Component.php');
		$Component = new Component();
		$contents = $Component->getContents($new, $category);
		$markup = $contents['markup'];

		if ($markup) {
			$contents = str_replace($this->getCommentString($old, $category), $this->getCommentString($new, $category), $markup);

			return $this->write($this->pathPhp($new, $category), $contents);
		}

		return array('status' => false, 'message' => 'Could not find component. Comment string not update.');

	}

	/**
	 * Create a PHP component file and add starter content
	 *
	 * @param        $filename
	 * @param        $directory
	 * @param string $content
	 */
	public function create($component, $directory, $content = '') {
		$fullPath = $this->config['componentDirectory'] . '/' . $directory;
		$filename = $component . '.' . $this->config['componentExt'];
		$fullFilePath = $fullPath . '/' . $filename;

		$commentString = $this->getCommentString($component, $directory);
		$mainBody = "\n\n<section class='{$component}'>" . $component . "</section>\n\n";
		$content = $commentString . $mainBody;

		$create = parent::createFile($fullFilePath, $content);

		return $create;
	}

	/**
	 * @param $component
	 * @param $category
	 *
	 * @return string
	 */
	public function open($component, $category) {
		$path = parent::pathPhp($component, $category);

		return parent::openFile($path);
	}

	public function rename($component, $newName, $category) {
		$file = $this->pathPhp($component, $category);
		$newFile = $this->pathPhp($newName, $category);

		$rename = parent::rename($file, $newFile);

		if ($rename['status']) {
			$comment = $this->updateCommentString($component, $newName, $category);

			if (!$comment['status']) {
				$rename['message'] = $comment['message'];
			}
		}

		return $rename;
	}

	/**
	 * @param $filename
	 * @param $directory
	 */
	public function remove($filename, $directory) {
		$fullPath = $this->config['preCssDir'] . '/' . $directory;
		$filename .= '.' . $this->config['preCssExt'];

		parent::removeFile($fullPath . '/' . $filename);
	}

}