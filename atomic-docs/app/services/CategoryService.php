<?php

class CategoryService {

	/** @var OptionModel */
	static private $category = null;
	static $allCategories = null;

	/**
	 * @return CategoryModel
	 */
	static public function get() {

		if ( self::$category === null ) {
			$f3 = Base::instance();

			self::$category = new CategoryModel( $f3->get( 'db' ) );

			self::$category->load();
		}

		return self::$category;

	}

	/**
	 * @param $id
	 *
	 * @return CategoryModel
	 */
	static public function getCategoryById( $id ) {
		$m      = new CategoryModel( \Base::instance()->get( 'db' ) );
		$filter = [ 'categoryId= ?', $id ];
		$m->load( $filter );

		return $m;
	}


	static public function getCategorySlugById( $id ) {
		$cat = self::getCategoryById( $id );

		return $cat->slug;


	}


	/*static public function updateOption( $key, $value ) {
		$o = new OptionModel(\Base::instance()->get('db'));
		$o->load( [ 'key = ?', $key ] );

		$o->value = $value;
		$o->save();
	}

	static public function getOption( $key ) {
		if ( ! self::$allOptions ) {
			$m       = new OptionModel( \Base::instance()->get( 'db' ) );
			$options = $m->find();

			foreach ( $options as $o ) {
				self::$allOptions[ $o->key ] = $o->value;
			}

		}

		if ( isset( self::$allOptions[ $key ] ) ) {
			return self::$allOptions[ $key ];
		}

		return null;
	}*/

}