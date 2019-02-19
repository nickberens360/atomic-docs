<?php

$stylesDir = OptionService::getOption('stylesDir');
$stylesExt = OptionService::getOption('stylesExt');
$markupDir = OptionService::getOption('markupDir');

class Component {
	/** @var ComponentModel */
	public $model;
	/** @var int */
	public $componentId;
	/** @var string */
	public $name;
	/** @var string */
	public $slug;
	/** @var bool */
	public $hasJs;
	/** @var string */
	public $backgroundColor;
	/** @var string */
	public $description;
	/** @var string */
	public $compFile;
	/** @var string Slug of the component's category */
	public $compCat;

	public function __construct(ComponentModel $component) {
		$this->model = $component;
	}

	/**
	 * @param $key
	 * @return mixed
	 */
	public function __get($key) {
		if (isset($this->model->{$key})) {
			return $this->model->{$key};
		}
	}

	public function hasJs() {
		return $this->model->hasJs;
	}

	public function fullScreen() {
		return $this->model->fullScreen;
	}

	public function backgroundColor() {
		return $this->model->backgroundColor;
	}

	public function description($decode = true) {
		if ($decode) {
			return htmlspecialchars_decode($this->model->description);
		}

		return $this->model->description;
	}

	public function name() {
		return $this->model->name;
	}

	public function componentId() {
		return $this->model->componentId;
	}

	public function slug() {
		return $this->model->slug;
	}

	public function compCat() {
		$category = CategoryService::getCategorySlugById($this->model->categoryId);

		return $category;
	}

	/**
	 * @param Component $comp
	 * @param string $type What you want to display. markup, styles, js.
	 *
	 * @return string
	 */
	public function compFile(Component $comp, $type = 'markup') {
		$stylesDir = OptionService::getOption('stylesDir');
		$stylesExt = OptionService::getOption('stylesExt');
		$jsDir = OptionService::getOption('jsDir');
		$jsExt = OptionService::getOption('jsExt');
		$markupExt = OptionService::getOption('markupExt');
		$markupDir = OptionService::getOption('markupDir');
		$underScore = "";

		switch ($type) {
			case 'styles':
				$dir = $stylesDir;
				$ext = $stylesExt;
				$underScore = '_';
				break;
			case 'js':
				$dir = $jsDir;
				$ext = $jsExt;
				break;
			default:
				$dir = $markupDir;
				$ext = $markupExt;
		}

		$path = FRONT . '/' . $dir;

		if ($type !== 'js') {
			$cat = CategoryService::getCategoryById($comp->categoryId);

			$itemService = new ItemsService();
			$items = $itemService->getCategoriesAsItems();
			$parents = $itemService->findParents(array_reverse($items), $cat->categoryId);
			$hierarchy = $itemService->buildHierarchy(array_reverse($parents), 0, 0, null, false);
			$path .= '/' . buildDirPath($hierarchy);

			//		if ($type != 'js' && $cat->parentCatId !== null) {
			//			$pc = CategoryService::getCategoryById($cat->parentCatId);
			//			$path .= $pc->slug;
			//		}
			//
			//		if ($type != 'js') {
			//			$path .= $cat->slug;
			//		}

			$path .= $underScore . $comp->slug() . '.' . $ext;
		}
		else {
			$path .= '/' . $comp->slug() . '.' . $ext;
		}

		return $path;
	}

}
