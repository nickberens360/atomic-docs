<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 11:00 AM
 */
class Atomic {
	/**
	 * @var array
	 */
	public $config;
	static $includePath;

	/**
	 * Atomic constructor.
	 */
	function __construct() {
		$this->config = array();
		$this->config['basePath'] = dirname(__FILE__) . '/../../../src';
		$this->config['atomicCorePath'] = dirname(__FILE__) . '/../..';
		$this->config['atomicCoreUrl'] = '/atomic-core';
		$this->config['preCssDirectoryName'] = 'scss'; //Preprocessed directory name. E.G sass, less
		$this->config['preCssDir'] = $this->config['basePath'] . '/' . $this->config['preCssDirectoryName']; // Preprocessed full directory path
		$this->config['preCssExt'] = 'scss'; //prerocessed file ext. E.G. scss, sass, less
		$this->config['componentExt'] = 'php'; //markup file ext. E.G. html, twig, etc...
		$this->config['componentDirectory'] = $this->config['basePath'] . '/components';
		$this->config['categoryDirectoryName'] = 'categories';
		$this->config['categoryDirectory'] = $this->config['basePath'] . '/' . $this->config['categoryDirectoryName']; //markup file ext. E.G. html, twig, etc...
		$this->config['filenamePrefix'] = '_';
	}

	static function includePath(){
		return dirname(__FILE__) . '/../..';
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
	function pathScss($component, $category) {
		return $this->config['preCssDir'] . '/' . $category . '/_' . $component . '.' . $this->config['preCssExt'];
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
	function pathPhp($component, $category = null) {
		if ($category) {
			return $this->config['componentDirectory'] . '/' . $category . '/' . $component . '.' . $this->config['componentExt'];
		}

		return $this->config['componentDirectory'] . '/' . $component;
	}

	function includeCategoryComponents($category) {
		$this->fileIterator($category, array('Component', 'outputContents'));
	}

	function includeFile($file, $directory) {
		$path = $directory . '/' . $file . '.' . $this->config['componentExt'];
		include($path);
	}

	function fileIterator($category, $callback = null) {
		$fullpath = $this->pathPhp($category);

		if ($dir = opendir($fullpath)) {
			while ($file = readdir($dir)) {
				$ok = true;
				$filename = $file;
				$filename = basename($filename, ".php");
				if ($file == ".") {
					$ok = false;
				}
				else if ($file == "..") {
					$ok = false;
				}
				if ($ok) {
					$filename = str_replace(".php", "", $filename);
					require_once(Atomic::includePath() . '/inc/lib/Component.php');
					$class = new $callback[0];
					if (method_exists($class, $callback[1])) {
						$class->$callback[1]($filename, $category);
					}
				}
			}
			closedir($dir);
		}
	}

	/**
	 * @param $component
	 * @param $category
	 * @param $componentNotes
	 * @param $backgroundColor
	 *
	 * @return string
	 */
	function createIncludeString($component, $category, $componentNotes, $backgroundColor) {
		$includeString = '
<div class="compWrap">
	<span id="' . $component . '" class="compTitle">' . $component . ' <span class="js-hideAll fa fa-eye"></span></span>
	<p class="compNotes">' . $componentNotes . '</p>
	<div class="component" style="background-color:' . $backgroundColor . '">
		<?php include("' . $this->pathPhp($component, $category) . '"); ?>
	</div>
	<div class="compCodeBox">
		<ul class="nav nav-tabs" role="tablist">
			<li role="presentation" class="active">
				<a href="#' . $component . '-markup" aria-controls="' . $component . '-markup" role="tab"
				   data-toggle="tab">Markup</a>
			</li>
			<li role="presentation">
				<a href="#' . $component . '-css" aria-controls="' . $component . '-css" role="tab" data-toggle="tab">'
			. $this->config['preCssExt'] . '</a>
			</li>
		</ul>
		<div class="tab-content">
			<div role="tabpanel" class="tab-pane active markup-display" id="' . $component . '-markup"></div>
			<div role="tabpanel" class="tab-pane" id="' . $component . '-css">
							<pre>
								<code class="language-css">
									<?php include("' . $this->pathScss($component, $category) . '"); ?>
								</code>
							</pre>
			</div>
		</div>
	</div>
</div>
';

		return $includeString;
	}

	public static function give($key, $value) {
		$GLOBALS[$key] = $value;
	}

	public static function receive($key, $default = null) {
		return isset($GLOBALS[$key]) ? $GLOBALS[$key] : $default;
	}

	/**
	 * @param $key
	 *
	 * @return mixed|null
	 */
	public static function getValue($key) {
		if (isset($key)) {
			return filter_input(INPUT_GET, $key, FILTER_SANITIZE_STRING);
		}
		else {
			return null;
		}
	}

	/**
	 * @param $key
	 *
	 * @return mixed|null
	 */
	public static function postValue($key) {
		if (isset($key)) {
			return filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
		}
		else {
			return null;
		}
	}

	public static function render($view = null) {
		if($view){

		}
	}

	public static function partial($view) {
		$path = self::includePath() .'/inc/view/_'. $view .'.php';

		if(file_exists($path)){
			include $path;
		}
		else {
			var_dump('invalid file: '. $path);
		}
	}

}