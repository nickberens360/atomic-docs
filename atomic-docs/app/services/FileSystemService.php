<?php

class FileSystemService {

	public function createCategory(CategoryModel $category) {
		global $dir;
		$stylesDir = OptionService::getOption('stylesDir');
		$markupDir = OptionService::getOption('markupDir');

		$FileService = new FileService();

		$service = new ItemsService();
		$items = $service->getCategoriesAsItems(null, true);
		$parents = $service->findParents(array_reverse($items), $category->categoryId);
		$hierarchy = $service->buildHierarchy(array_reverse($parents), 0, 0, null, false);

		$dir = buildDirPath($hierarchy);

		$FileService->makeDirectory(
			FRONT . '/' . $markupDir . '/' . $dir
		);

		//Create style dir
		$FileService->makeDirectory(
			FRONT . '/' . $stylesDir . '/' . $dir
		);

		//Write import string to root style file
		$FileService->createStyle($category, $FileService, $service, $hierarchy);
	}

	public function recurse_copy($src, $dst) {
		$dir = opendir($src);
		@mkdir($dst);
		while (false !== ($file = readdir($dir))) {
			if (($file != '.') && ($file != '..')) {
				if (is_dir($src . '/' . $file)) {
					$this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
				}
				else {
					copy($src . '/' . $file, $dst . '/' . $file);
				}
			}
		}
		closedir($dir);
	}

	public function rrmdir($dir) {
		if (is_dir($dir)) {
			$objects = scandir($dir);
			foreach ($objects as $object) {
				if ($object != "." && $object != "..") {
					if (is_dir($dir . "/" . $object)) {
						$this->rrmdir($dir . "/" . $object);
					}
					else {
						unlink($dir . "/" . $object);
					}
				}
			}
			rmdir($dir);
		}
	}

	public function deleteCat($type, $catSlug) {
		$markupDir = OptionService::getOption('markupDir');
		$stylesDir = OptionService::getOption('stylesDir');
		if ($type == 'markup' && !empty($catSlug)) {
			$dir = FRONT . '/' . $markupDir . '/' . $catSlug;
			$this->rrmdir($dir);
		}
		if ($type == 'styles' && !empty($catSlug)) {
			$dir = FRONT . '/' . $stylesDir . '/' . $catSlug;
			$this->rrmdir($dir);
		}
	}

}
