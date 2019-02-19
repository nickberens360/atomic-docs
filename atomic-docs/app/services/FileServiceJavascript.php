<?php
/**
 * File: FileServiceStyle.php
 * Date: 2019-02-12
 * Time: 08:04
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class FileServiceJavascript {

	public function __construct() {
		// parent::__construct();
	}

	/**
	 * @param $old
	 * @param $new
	 * @param $oldParentPath
	 * @param $parentPath
	 */
	public static function editCommentString($old, $new) {
		$fs = new FileService();
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		//Change js comp comment string
		$from = '/* ' . $jsDir . '/' . $old . '.' . $jsExt . ' */';
		$to = '/* ' . $jsDir . '/' . $new . '.' . $jsExt . ' */';
		$path = FRONT . '/' . $jsDir . '/' . $old . '.' . $jsExt;

		$fs->stringReplace($path, $from, $to);

		eval(\Psy\sh());
	}

	/**
	 * Create the style directory, file, and write the import string
	 *
	 * @param ComponentModel $component
	 */
	public static function createFile(ComponentModel $component) {
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		$FileService = new FileService();

		//Create js file
		$FileService->makeFile(FRONT . '/' . $jsDir . '/' . $component->slug . '.' . $jsExt);

		//Create js file location comment string
		$commentString = '/* ' . $jsDir . '/' . $component->slug . '.' . $jsExt . ' */' . "\n\n";

		//Write js file location comment string to file
		$FileService->write(FRONT . '/' . $jsDir . '/' . $component->slug . '.' . $jsExt, $commentString);
	}

	/**
	 * @param ComponentModel $component
	 * @param $oldName
	 */
	public static function editFile(ComponentModel $component, $oldName) {
		$fs = new FileService();
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		$fs->editName(
			FRONT . '/' . $jsDir . '/' . $oldName . '.' . $jsExt,
			FRONT . '/' . $jsDir . '/' . $component->slug . '.' . $jsExt
		);
	}

	public static function editContent(ComponentModel $component, $content) {
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');
		$path = FRONT . '/' . $jsDir . '/' . $component->oldSlug . '.' . $jsExt;

		file_put_contents($path, $content);
	}

}
