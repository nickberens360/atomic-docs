<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 10:58 AM
 */

require_once(Atomic::includePath() . '/inc/lib/Atomic.php');
require_once(Atomic::includePath() . '/inc/lib/File/FileScss.php');
require_once(Atomic::includePath() . '/inc/lib/File/FileComponent.php');
require_once(Atomic::includePath() . '/inc/lib/fllat.php');
require_once(Atomic::includePath() . '/inc/lib/FllatComponent/FllatComponent.php');


/**
 * Class Component
 */
class Component extends Atomic {

	/**
	 * @var array
	 */
	private $errors;
	/**
	 * @var array
	 */
	private $data;

	/**
	 * Component constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->errors = array();
		$this->data = array();
	}

	/**
	 * @param $component
	 */
	public function get($component) {

	}

	/**
	 * Create a new component
	 *
	 * @param $component
	 * @param $category The category that it shall go under
	 */
	function create($component, $category, $description = '', $backgroundColor = null) {
		$fullFilePath = $this->config['categoryDirectory'] . '/' . $category . '/' . $component . '.' . $this->config['componentExt'];

		$FileScss = new FileScss();
		$FileComponent = new FileComponent();

		$commentString = '<!--' . $this->config['categoryDirectoryName'] . '/' . $category . '/' . $component . '-->';
		$mainBody = "\n\n<section class='{$component}'>" . $component . "</section>\n\n";
		$content = $commentString . $mainBody;

		$scss = $FileScss->create($component, $category);
		$comp = $FileComponent->create($component, $category, $content);
//		$includeString = $this->createIncludeString($component, $category);


		if ($scss['status'] && $comp['status']) {

//			$File = new File();
//			$File->append($this->config['categoryDirectory'] . '/' . $category . '/' . $category . '.' . $this->config['componentExt'], $includeString);

			$db = new FllatComponent();

			$status = $db->add(array('component' => $component, 'category' => $category, 'description' => $description, 'backgroundColor' => $backgroundColor, 'order' => $this->getCount()));

			if ($status['status']) {
				return array('status' => true, 'message' => 'Successful');
			}
			else {
				return $status;
			}
		}
		else {
			return !$scss['status'] ? $scss : $comp;
		}

	}

	public function update($component, array $data){
		$FllatComponent = new FllatComponent();
		$FllatComponent->updateName($component, $data);
		$nameUpdated = $this->updateName($component, $data['newValue'], $data['category']);

		return $nameUpdated;
	}

	public function updateName($component, $newName, $category){
		$FileComponent = new FileComponent();
		return $FileComponent->rename($component, $newName, $category);
	}


	/**
	 * @return int
	 */
	function getCount() {
		$FllatComponent = new FllatComponent();

		return $FllatComponent->count();
	}

	/**
	 * Remove a file
	 *
	 * @param $file Full path and filename of file to be removed
	 */
	function remove($file) {
		unlink($file);
	}

	/**
	 * @param $component
	 * @param $category
	 *
	 * @return array
	 */
	function getContents($component, $category) {
		$FileScss = new FileScss();
		$FileComponent = new FileComponent();
		$markup = $FileComponent->open($component, $category);
		$scss = $FileScss->open($component, $category);

		return array('markup' => $markup, 'scss' => $scss);
	}

	/**
	 * @param $component
	 * @param $category
	 */
	function outputContents($component, $category) {
		$content = $this->getContents($component, $category);
		Atomic::give('content', $content);
		Atomic::give('component', $component);
		Atomic::give('category', $category);

		Atomic::partial('component');
	}

	/**
	 * Build file path
	 * Used for include writes and File* creation
	 *
	 * @param $component
	 * @param $category
	 *
	 * @return string
	 */
	function path($component, $category) {
		return $this->config['preCssExt'] . '/' . $category . '/_' . $component . '.' . $this->config['preCssExt'];
	}

}