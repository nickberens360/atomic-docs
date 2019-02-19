<?php
/**
 * File: FileServiceStyle.php
 * Date: 2019-02-12
 * Time: 08:04
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class FileServiceStyle {

	public function __construct() {
		// parent::__construct();
	}

	public static function createCategory(CategoryModel $category, FileService $FileService, ItemsService $ItemsService, $hierarchy) {
		global $dir;
		global $isTopLevel;
		$dir = '';
		$isTopLevel = false;
		if (empty(($hierarchy[0]->children ?? 0))) {
			$isTopLevel = true;
		}

		$ItemsService->traverseHierarchy($hierarchy, function ($item) use ($category, $FileService) {
			global $dir;
			global $isTopLevel;
			$dir .= $item->slug . '/';

			// if the category is the immediate parent of the new category, then add the css
			if ($category->parentCatId == $item->id) {
				$importString = '@import "' . $category->slug . '/_' . $category->slug . '";' . "\n";
				$mainScssFile = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $dir . '_' . $item->slug . '.' . OptionService::getOption('stylesExt');
				$FileService->write($mainScssFile, $importString);
			}
			else if ($isTopLevel) {
				$importString = '@import "' . $category->slug . '/_' . $category->slug . '";' . "\n";
				$mainScssFile = FRONT . '/' . OptionService::getOption('stylesDir') . '/main.' . OptionService::getOption('stylesExt');
				$FileService->write($mainScssFile, $importString);
			}
		});

		//Create style file
		$FileService->write(
			FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $dir . '/_' . $category->slug . '.' . OptionService::getOption('stylesExt'),
			''
		);
	}

	//	public static function editName($old, $new, $path) {
	//		$fs = new FileService();
	//		$from = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $path . $old;
	//		$to = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $path . $new;
	//
	//		d($from, $to);
	//
	//		$fs->editName($from, $to);
	//
	//	}

	public static function editCategory($old, $new, $path, CategoryModel $category = null) {
		$fs = new FileService();
		$path = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $path;

		$from = $path . $old;
		$to = $path . $new;
		$fileFrom = $path . $new . '/_' . $old . '.' . OptionService::getOption('stylesExt');
		$fileTo = $path . $new . '/_' . $new . '.' . OptionService::getOption('stylesExt');
		//
		//		d('EDIT CATEOGYR');
		//		d($from, $to, $fileFrom, $fileTo);

		// update the directory name
		$fs->editName($from, $to);

		// update the directory's root SCSS filename
		$fs->editName($fileFrom, $fileTo);
	}

	/**
	 * @param $old
	 * @param $new
	 * @param $oldPath
	 * @param $newPath
	 * @param $oldParentPath
	 * @param $parentPath
	 */
	public static function editCommentString($old, $new, $oldParentPath, $parentPath) {
		$fs = new FileService();
		$from = '/* ' . OptionService::getOption('stylesDir') . '/' . $oldParentPath;
		$to = '/* ' . OptionService::getOption('stylesDir') . '/' . $parentPath;
		$path = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $oldParentPath . '_*.' . OptionService::getOption('stylesExt');

		$fs->globFindReplace($path, $from, $to);
	}

	/**
	 * Create the style directory, file, and write the import string
	 *
	 * @param CategoryModel $category
	 * @param FileService $FileService
	 * @param ItemsService $ItemsService
	 * @param array $hierarchy
	 */
	public static function createFile(CategoryModel $category, FileService $FileService, ItemsService $ItemsService, $hierarchy) {
		global $dir;
		global $isTopLevel;
		$dir = '';
		$isTopLevel = false;
		if (empty(($hierarchy[0]->children ?? 0))) {
			$isTopLevel = true;
		}

		$ItemsService->traverseHierarchy($hierarchy, function ($item) use ($category, $FileService) {
			global $dir;
			global $isTopLevel;
			$dir .= $item->slug . '/';

			// if the category is the immediate parent of the new category, then add the css
			if ($category->parentCatId == $item->id) {
				$importString = '@import "' . $category->slug . '/_' . $category->slug . '";' . "\n";
				$mainScssFile = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $dir . '_' . $item->slug . '.' . OptionService::getOption('stylesExt');
				$FileService->write($mainScssFile, $importString);
			}
			else if ($isTopLevel) {
				$importString = '@import "' . $category->slug . '/_' . $category->slug . '";' . "\n";
				$mainScssFile = FRONT . '/' . OptionService::getOption('stylesDir') . '/main.' . OptionService::getOption('stylesExt');
				$FileService->write($mainScssFile, $importString);
			}
		});

		//Create style file
		$FileService->write(
			FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $dir . '/_' . $category->slug . '.' . OptionService::getOption('stylesExt'),
			''
		);
	}

	/**
	 * @param ComponentModel $component
	 * @param $oldName
	 */
	public static function editFile(ComponentModel $component, $oldName) {
		global $path;
		$path = OptionService::getOption('stylesDir') . '/' . getComponentPath($component);

		$fs = new FileService();
		//Change style comp name
		$fs->editName(
			FRONT . '/' . $path . '_' . $oldName . '.' . OptionService::getOption('stylesExt'),
			FRONT . '/' . $path . '_' . $component->slug . '.' . OptionService::getOption('stylesExt')
		);

		//Change style comp root import string
		$fs->stringReplace(
			FRONT . '/' . $path . '_' . $component->getCategory()->name . '.' . OptionService::getOption('stylesExt'),
			'@import "_' . $oldName . '";',
			'@import "_' . $component->slug . '";'
		);

		//Change style comp comment string
		$fullPath = FRONT . '/' . $path . '_' . $component->slug . '.' . OptionService::getOption('stylesExt');
		$from = '_' . $oldName . '.' . OptionService::getOption('stylesExt');
		$to = '_' . $component->slug . '.' . OptionService::getOption('stylesExt');

		$fs->stringReplace($fullPath, $from, $to);
	}

}
