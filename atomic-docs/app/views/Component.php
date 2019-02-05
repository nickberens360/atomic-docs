<?php

$stylesDir = OptionService::getOption( 'stylesDir' );
$stylesExt = OptionService::getOption( 'stylesExt' );
$markupDir = OptionService::getOption( 'markupDir' );


class Component {
	public $model;
	public $componentId;
	public $name;
	public $slug;
	public $hasJs;
	public $backgroundColor;
	public $description;
	public $compFile;
	public $compCat;

	public function __construct( ComponentModel $component ) {
		$this->model = $component;
	}

	public function __get( $key ) {
		if ( isset( $this->model->{$key} ) ) {
			return $this->model->{$key};
		}
	}

	public function hasJs() {
		return $this->model->hasJs;
	}

	public function backgroundColor() {
		return $this->model->backgroundColor;
	}

	public function description($decode=true) {
		if($decode){

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

		$category = CategoryService::getCategorySlugById( $this->model->categoryId );

		return $category;


	}


	/**
	 * @param ComponentModel $comp
	 * @param string $type What you want to display. markup, styles, js.
	 *
	 * @return string
	 */
	public function compFile( Component $comp, $type = 'markup' ) {
		$stylesDir = OptionService::getOption( 'stylesDir' );
		$stylesExt = OptionService::getOption( 'stylesExt' );
		$jsDir     = OptionService::getOption( 'jsDir' );
		$jsExt     = OptionService::getOption( 'jsExt' );
		$markupExt = OptionService::getOption( 'markupExt' );
		$markupDir = OptionService::getOption( 'markupDir' );
		$underScore = "";

		switch ( $type ) {
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

		$cat = CategoryService::getCategoryById( $comp->categoryId );

		if ( $type != 'js'&&$cat->parentCatId !== null ) {
			$pc   = CategoryService::getCategoryById( $cat->parentCatId );
			$path .= '/' . $pc->slug;
		}

		if ($type != 'js'){
			$path .= '/' . $cat->slug;
		}



		$path .= '/' . $underScore.$comp->slug() . '.' . $ext;


		return $path;

	}




}