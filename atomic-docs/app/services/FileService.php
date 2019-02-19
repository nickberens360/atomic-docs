<?php

class FileService {

	public function write($filePath, $content) {
		$this->makeFile($filePath);

		file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
	}

	public function makeDirectory($filePath) {
		if (!file_exists($filePath)) {
			mkdir($filePath, 0777, true);
		}
	}

	public function makeFile($filePath) {
		if (!file_exists($filePath)) {
			fopen($filePath, 'w') or die('Cannot open file:  ' . $filePath);
		}
	}

	public function editName($oldPath, $newPath) {
		rename($oldPath, $newPath);
	}

	public function stringReplace($path, $oldString, $newString) {
		$contents = file_get_contents($path);
		$contents = str_replace($oldString, $newString, $contents);
		file_put_contents($path, $contents);
	}

	public function globFindReplace($path, $oldString, $newString) {
		foreach (glob($path) as $filename) {
			$this->stringReplace($filename, $oldString, $newString);
		}
	}

	public function deleteFile($path) {
		unlink($path);
	}

	public function stringBuilder($type, $dirPath, $file) {
		$stylesDir = OptionService::getOption('stylesDir');
		$stylesExt = OptionService::getOption('stylesExt');
		$markupDir = OptionService::getOption('markupDir');
		$markupExt = OptionService::getOption('markupExt');
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		if ($type == "styleImport") {
			if ($dirPath == null) {
				$string = '@import "_' . $file . '";';
			}
			else {
				$string = '@import "' . $dirPath . '/_' . $file . '";';
			}
		}

		return $string;
	}

	public function createComponent(ComponentModel $component) {
		$stylesDir = OptionService::getOption('stylesDir');
		$stylesExt = OptionService::getOption('stylesExt');
		$markupDir = OptionService::getOption('markupDir');
		$markupExt = OptionService::getOption('markupExt');
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');

		$category = new CategoryModel();
		$category->loadById($component->categoryId);

		$service = new ItemsService();
		$items = $service->getCategoriesAsItems();
		$parents = $service->findParents(array_reverse($items), $category->categoryId);
		$hierarchy = $service->buildHierarchy(array_reverse($parents), 0, 0, null, false);

		$dir = buildDirPath($hierarchy);

		//Create style file
		$this->makeFile(FRONT . '/' . $stylesDir . '/' . $dir . '_' . $component->slug . '.' . $stylesExt);

		//Create style file location comment string
		$commentString = '/* ' . $stylesDir . '/' . $dir . '_' . $component->slug . '.' . $stylesExt . ' */' . "\n\n";

		//Write style file location comment string to file
		$this->write(FRONT . '/' . $stylesDir . '/' . $dir . '_' . $component->slug . '.' . $stylesExt, $commentString);

		//Create markup file
		$this->makeFile(FRONT . '/' . $markupDir . '/' . $dir . $component->slug . '.' . $markupExt);
		//Create markup file location comment string
		$commentString = '<!-- ' . $markupDir . '/' . $dir . $component->slug . '.' . $markupExt . ' -->' . "\n\n";
		//Write markup file location comment string to file
		$this->write(FRONT . '/' . $markupDir . '/' . $dir . $component->slug . '.' . $markupExt, $commentString);

		FileServiceJavascript::createFile($component);

		$FileService = $this;
		$ItemsService = new ItemsService();
		$td = '';
		$ItemsService->traverseHierarchy($hierarchy, function ($item) use ($component, $category, $FileService) {
			global $td;
			$td .= $item->slug . '/';

			// if the category is the immediate parent of the new category, then add the css
			if ($category->categoryId == $item->id) {
				$importString = '@import "_' . $component->slug . '";' . "\n";
				$mainScssFile = FRONT . '/' . OptionService::getOption('stylesDir') . '/' . $td . '_' . $item->slug . '.' . OptionService::getOption('stylesExt');
				$FileService->write($mainScssFile, $importString);
			}
		});
	}

	/**
	 * Create the style directory, file, and write the import string
	 *
	 * @param CategoryModel $category
	 * @param FileService $FileService
	 * @param ItemsService $ItemsService
	 * @param array $hierarchy
	 */
	public function createStyle(CategoryModel $category, FileService $FileService, ItemsService $ItemsService, $hierarchy) {
		FileServiceStyle::createFile($category, $FileService, $ItemsService, $hierarchy);
	}

	/**
	 * Rename the style directory, file, and write the import string
	 *
	 * @param ComponentModel $component
	 * @param $oldName
	 */
	public function editStyleName(ComponentModel $component, $oldName) {
		FileServiceStyle::editFile($component, $oldName);
	}

	public function editMarkupName(ComponentModel $component, $oldName) {
		FileServiceMarkup::editFile($component, $oldName);
	}

	/**
	 * Change a category path and update all components/styles comment strings beneath it
	 * to reflect the new directory structure
	 *
	 * @since 4.0.0
	 *
	 * @param CategoryModel $category
	 * @param $oldPath
	 */
	public function editCategoryName(CategoryModel $category, $oldPath) {
		$itemService = new ItemsService();
		$categories = $itemService->getCategoriesAsItems(null, true);
		$th = $itemService->buildHierarchy($categories, ($category->parentCatId ?? 0), 0, null, true);

		$parentPath = getCategoryPath($category);

		// first change all of the comment strings
		$itemService->traverseHierarchy($th, function ($i) use ($category, $oldPath, $parentPath) {
			/** @var Item $i */
			$tc = new CategoryModel();
			$tc->loadById($i->id);

			$childPath = getCategoryPath($tc, true);
			$oldChildPath = replace_substr($parentPath, $oldPath, $childPath);

			FileServiceMarkup::editCommentString($category->oldSlug, $category->slug, $oldChildPath, $childPath);
			FileServiceStyle::editCommentString($category->oldSlug, $category->slug, $oldChildPath, $childPath);
		}, true);

		// then change the actual directory name
		$itemService->traverseHierarchy($th, function ($i) use ($category, $oldPath, $parentPath) {
			/** @var Item $i */
			$tc = new CategoryModel();
			$tc->loadById($i->id);

			if ($i->id == $category->categoryId) {
				$childPath = getCategoryPath($tc, false);
				//Change markup directory name
				FileServiceMarkup::editCategory($category->oldSlug, $category->slug, $childPath);
				FileServiceStyle::editCategory($category->oldSlug, $category->slug, $childPath);
			}
		}, true);

		// search the parent to change the import string for the new directory name
		$parents = $itemService->findParents($categories, $category->parentCatId);
		$itemService->traverseHierarchy($parents, function ($i) use ($category) {
			if ($i->id === $category->parentCatId) {
				$path = OptionService::getOption('stylesDir') . '/' . getCategoryPath($category) . '../_' . $i->slug;
				$fullpath = FRONT . '/' . $path . '.' . OptionService::getOption('stylesExt');

				$this->stringReplace(
					$fullpath,
					'@import "' . $category->oldSlug . '/_' . $category->oldSlug . '";',
					'@import "' . $category->slug . '/_' . $category->slug . '";'
				);
			}
		});
	}

}
