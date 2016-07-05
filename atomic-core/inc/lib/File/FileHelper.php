<?php

/**
 * Created by PhpStorm.
 * User: michael
 * Date: 6/17/16
 * Time: 10:58 AM
 */
require_once(Atomic::includePath() . '/inc/lib/Atomic.php');

/**
 * Class File
 */
class File extends Atomic {

	/**
	 * @var array
	 */
	private $errors;
	/**
	 * @var array
	 */
	private $data;

	/**
	 * File constructor.
	 */
	public function __construct() {
		parent::__construct();

		$this->errors = array();
		$this->data = array();
	}

	public function pathPhp($component, $category = null) {
		return parent::pathPhp($component, $category);
	}

	/**
	 * Create a file
	 *
	 * @param        $file
	 * @param string $content
	 * @param string $append
	 *
	 * @return array
	 */
	function createFile($file, $content = '', $append = '') {
//		$file = $directory.'/'.'_'.$filename;
		$valid = $this->validate($file);

		if ($valid['status']) {
			return $this->write($file, $content);
		}
		else {
			return $valid;
		}
	}

	function mkdir($directory){
		$created = mkdir($directory, 0755);

		if( $created ){
			return array('status' => true, 'message' => 'Directory created');
		}
		else {
			return array('status' => false, 'message' => 'Failed to create directory');
		}
	}

	function openFile($file) {
		return file_get_contents($file);
	}

	/**
	 * Write content to a file. This overwrites the file. To add content @see append() or @see prepend()
	 *
	 * @param $file
	 * @param $content
	 *
	 * @return array
	 */
	protected function write($file, $content) {
		$put = file_force_contents(trim($file), $content);

		return array('status' => ($put === false ? false : true), 'message' => $file);
	}

	/**
	 * @TODO implement
	 *
	 * @param $file
	 * @param $content
	 */
	function prepend($file, $content) {

	}

	/**
	 * Append content to a file. To overwrite file @see write()
	 *
	 * @param $file
	 * @param $content
	 */
	function append($file, $content) {
		$fileHandle = fopen(trim($file), 'a') or die("can't open file: " . $file);

		fwrite($fileHandle, $content);
		fclose($fileHandle);
	}

	/**
	 * Remove a file
	 *
	 * @param $file Full path and filename of file to be removed
	 */
	function removeFile($file) {
		unlink($file);
	}
	
	function outputContents($file, $directory) {
		$contents = $this->open($directory . '/' . $file . '.' . $this->config['componentExt']);
		?>
		<pre>
	<code>
<?= trim(htmlentities($contents)); ?>
	</code>
</pre>
		<?php
	}
	
	/**
	 * Validate file and ensure it doesn't exist
	 *
	 * @param $file
	 *
	 * @return array
	 */
	protected function validate($file) {
		if (file_exists($file)) {
			return array('status' => false, 'message' => 'File exists. Will not overwrite.');
		}

		return array('status' => true, 'message' => 'File is valid');
	}
	
}