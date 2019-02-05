<?php

class Controller {


	const
		FILE_TYPE_JSON = 'json',
		FILE_TYPE_HTML = 'html';

	/** @var string */
	protected static $requestedFileType = 'html';

	/** @var bool */
	private static $pageRendered = false;
	/** @var bool */
	private static $pageRedirected = false;
	/** @var string */
	protected $viewTemplate = 'home/index.php';


	protected $f3;
	protected $db;

	/*function beforeroute(){

	}*/

	/*function afterroute(){
		echo '- After routing';
	}*/


	function __construct() {

		if ( $this->f3 == null ) {


			$f3       = Base::instance();
			$this->f3 = $f3;


			$db = new DB\SQL(
				$f3->get( 'devdb' ), '', '',
				array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
			);

			$this->db = $db;

			$f3->set('db', $db);


			$category   = new CategoryModel( $this->db );
			$components = new ComponentModel( $this->db );





			$cat  = $category->find( null, [ 'order' => 'sort' ] );
			$comp = $components->find( null, [ 'order' => 'sort' ] );


			$this->f3->set( 'categories', $cat );


			//$this->prepareItems();

			$ItemsService = new ItemsService();
			$ItemsService->prepareItems();

			$this->prepareHeader();

			$this->prepareFooter();








			$this->f3->set( 'db', $db );

			$this->f3->set( 'components', $comp );

			$this->f3->set( 'catComponents', [] );

			//Set Logo

			$logo = $f3->get( 'BASE' ) . '/img/atomic-logo.svg';


			$f3->set( 'logo', $logo );


			$f3->set( 'header', 'common/header.htm' );


			$f3->set( 'search', 'common/search.htm' );

			$f3->set( 'sideBar', 'common/sideBar.htm' );

			$f3->set( 'nav', 'common/nav.htm' );

			$f3->set( 'pageBar', 'common/pageBar.htm' );

			$f3->set( 'footer', 'common/footer.htm' );

			$f3->set( 'catLoop', 'component/index.htm' );


			$f3->set( 'compView', 'component/view.htm' );














			$f3->set( 'appBase', Base::instance()->get('BASE') );





		}


	}


	public function prepareHeader() {

		$sidebar = OptionService::getOption('sidebar');

		\Base::instance()->set( 'sideBarOpen', $sidebar );
	}




	public function prepareFooter() {



	}









	public function beforeRoute() {
		self::$requestedFileType = isset( $this->f3->get( 'PARAMS' )['fileType'] ) ? $this->f3->get( 'PARAMS' )['fileType'] : self::FILE_TYPE_HTML;

		if ( isset( $_SERVER["HTTP_ACCEPT"] ) && strpos( $_SERVER["HTTP_ACCEPT"], 'json' ) ) {
			self::$requestedFileType = self::FILE_TYPE_JSON;
		}
	}


	/**
	 * @param             $content string
	 * @param string|null $view
	 * @param array $passThrough
	 * @param bool|true $showAlerts
	 *
	 * @return bool
	 */
	protected function renderHTML( $content = null, $view = null, $passThrough = [], $showAlerts = true, $template = false ) {
		// HTML request

		foreach ( $passThrough as $key => $value ) {
			${$key} = $value;
		}

		// if this view is called via ajax or from within a page - render without wrapper
		if ( $view === null && $content === null ) {
			$view = 'common/error.php';
		}
		if ( isAJAXRequest() || self::$pageRendered ) {
			if ( $view !== null ) {
				if ( $template ) {
					return \Template::instance()->render( $view );
				}

				return \View::instance()->render( $view );
			} else {
				return ( $content );
			}
		} else {
			if ( $template ) {
				echo \Template::instance()->render( $view );
			} else {
				echo \View::instance()->render( $view );
			}

		}

		return true;

	}

	protected function renderJSON( $passThrough = [], $errorCode = 200 ) {
		// json request
		$allowResponse = true;
		if ( $allowResponse ) {
			send_json( $passThrough, $errorCode );
		}

	}


	/**
	 * Render a response as either html or json objects
	 *
	 * @param       $view string
	 * @param array $passThrough
	 * @param bool $showAlerts
	 *
	 * @return bool
	 */
	protected function render( $view = null, $passThrough = [], $showAlerts = true, $template = false, $errorCode = 200 ) {


		// do not render view if page has already been redirected;
		if ( self::$pageRedirected ) {
			return false;
		} elseif ( self::$requestedFileType == self::FILE_TYPE_JSON ) {
			$json         = $passThrough;

			if(!isset($json['html'])){
				$json['html'] = ( $view ? $this->renderHTML( null, $view, $passThrough, $showAlerts, $template, $errorCode ) : false );
			}



			$this->renderJSON( $json, $errorCode );
		} else {


			$this->renderHTML( null, $view, $passThrough, $showAlerts, $template, $errorCode );
		}

		return true;
	}

	/**
	 * Render a template via the render method
	 *
	 * @param null $view
	 * @param array $passthrough
	 * @param bool $showAlerts
	 *
	 * @return bool
	 */
	protected function template( $view = null, $passthrough = [], $showAlerts = true ) {
		return $this->render( $view, $passthrough, $showAlerts, true );
	}


}