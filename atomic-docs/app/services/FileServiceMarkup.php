<?php
/**
 * File: FileServiceMarkup.php
 * Date: 2019-02-12
 * Time: 08:21
 *
 * @package atomicdocs.dev
 * @author Michael Dahlke <mdahlke@wisnet.com>
 */

class FileServiceMarkup {

	public function __construct() {
		// parent::__construct();
	}

	public static function editCategory($old, $new, $path) {
		$fs = new FileService();
		$from = FRONT . '/' . OptionService::getOption('markupDir') . '/' . $path . $old;
		$to = FRONT . '/' . OptionService::getOption('markupDir') . '/' . $path . $new;

		$fs->editName($from, $to);
	}

	public static function editFile(ComponentModel $component, $oldName) {
		$fs = new FileService();
		$path = OptionService::getOption('markupDir') . '/' . getComponentPath($component);

		//Change component comp name
		$fs->editName(
			FRONT . '/' . $path . $oldName . '.' . OptionService::getOption('markupExt'),
			FRONT . '/' . $path . $component->slug . '.' . OptionService::getOption('markupExt')
		);

		//Change markup comp comment string
		$fs->stringReplace(
			FRONT . '/' . $path . $component->slug . '.' . OptionService::getOption('markupExt'),
			'<!-- ' . $path . $oldName . '.' . OptionService::getOption('markupExt') . ' -->',
			'<!-- ' . $path . $component->slug . '.' . OptionService::getOption('markupExt') . ' -->'
		);

//		$fullPath = FRONT . '/' . $path . $component->slug . '.' . OptionService::getOption('markupExt');
//		$from = $oldName . '.' . OptionService::getOption('markupExt');
//		$to = $component->slug . '.' . OptionService::getOption('markupExt');
//
//		$fs->stringReplace($fullPath, $from, $to);
//
//		eval(\Psy\sh());
	}

	/**
	 * @param $old
	 * @param $new
	 * @param $oldParentPath
	 * @param $parentPath
	 */
	public static function editCommentString($old, $new, $oldParentPath, $parentPath) {
		$fs = new FileService();
		$from = '<!-- ' . OptionService::getOption('markupDir') . '/' . $oldParentPath;
		$to = '<!-- ' . OptionService::getOption('markupDir') . '/' . $parentPath;
		$path = FRONT . '/' . OptionService::getOption('markupDir') . '/' . $oldParentPath . '*.' . OptionService::getOption('markupExt');

		$fs->globFindReplace($path, $from, $to);
	}

	//	public static function editCategory(CategoryModel $category, $oldName) {
	//		$FileService = new FileService();
	//		$itemService = new ItemsService();
	//		$catName = $category->name;
	//		$catSlug = $category->slug;
	//		$categories = $itemService->getCategoriesAsItems();
	//		$th = $itemService->buildHierarchy($categories, $category->parentCatId, 0, null, false);
	//
	//		$itemService->traverseHierarchy($th, function ($i) use ($category, $oldName, $catSlug, $FileService) {
	//			if ($i->type === 'category') {
	//				$tc = new CategoryModel();
	//				$tc->loadById($i->id);
	//				$path = getCategoryPath($tc, false);
	//			}
	//			else {
	//				$tc = new ComponentModel();
	//				$tc->loadById($i->id);
	//				$path = getCategoryPath($tc, false);
	//			}
	//			d('PATH: ' . $path);
	//			p($i);
	//			/** @var Item $i */
	//			if ($i->id == $category->categoryId) {
	//				$from = FRONT . '/' . OptionService::getOption('markupDir') . '/' . $path . $oldName;
	//				$to = FRONT . '/' . OptionService::getOption('markupDir') . '/' . $path . $catSlug;
	//				d($oldName, $catSlug, $from, $to);
	//
	//				//Change markup directory name
	//				$FileService->editName($from, $to);
	//				//				FileServiceStyles::editName();
	//			}
	//		});
	//	}

}
