<?php

class OptionService {

	/** @var OptionModel */
	static private $option = null;
	static $allOptions = null;

	/**
	 * @return OptionModel
	 */
	static public function get() {

		if ( self::$option === null ) {
			$f3 = Base::instance();

			self::$option = new OptionModel( $f3->get( 'db' ) );

			self::$option->load();
		}

		return self::$option;

	}

	static public function updateOption( $key, $value ) {
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
	}

}