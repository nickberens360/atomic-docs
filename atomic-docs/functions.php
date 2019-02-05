<?php


$f3 = \Base::instance();




define('BASE_PATH', __DIR__);


define( 'FRONT', BASE_PATH. '/..' );






/*define( 'STYLES-DIR', 'scss' );

define( 'STYLES-EXT', '.scss' );

define( 'MARKUP-DIR', 'components' );

define( 'MARKUP-EXT', '.php' );

define( 'SCRIPTS-DIR', 'js' );

define( 'SCRIPTS-EXT', '.js' );*/



/**
 * Path to Atomic docs
 */
define( 'ATOMIC', BASE_PATH. '/components/' );
/**
 * Path to Atomic organism directory
 */
define( 'ATOMIC_ORGANISM', ATOMIC . 'organisms' );
/**
 * Path to Atomic molecule directory
 */
define( 'ATOMIC_MOLECULES', ATOMIC . 'molecules' );
/**
 * Path to Atomic atom directory
 */
define( 'ATOMIC_ATOM', ATOMIC . 'atoms' );

/**
 * Path to Atomic misc directory
 */
define( 'ATOMIC_MISC', ATOMIC . 'misc' );


define( 'ATOMIC_FORMS', ATOMIC . 'siteForms' );



function isAJAXRequest() {
    return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

function isFormRequest($type = null) {
    $request = false;
    if (!empty($_REQUEST)) {
        // request is defined
        if (count($_REQUEST) > 1) {
            // request has more than one entry - this is a form request
            switch ($type) {
                case 'POST':
                    $request = count($_POST) > 0 ? true : false;
                    break;
                case 'GET':
                    $request = count($_GET) > 0 ? true : false;
                    break;
                default:
                    $request = true;
            }
        }
        else {
            // only one entry might be IIS added parameter
            foreach ($_REQUEST as $key => $value) {
                if (!empty($value)) {
                    $request = true;
                }
            }
        }

    }
    if (!$request && !empty($_FILES)) {
        $request = true;
    }
    return $request;
}

function send_json($data, $statusCode = 200) {
    header('Content-Type: application/json');
    http_response_code($statusCode);

    echo json_encode($data);

    die();
}




function baseAlias($route, $params = NULL){
    return Base::instance()->get('BASE').Base::instance()->alias($route, $params);
}


function incFilter($path){
    include $path;
}


function iFramePath(){
    return \Template::instance()->render('component/iframe.htm');
}



function slugify($text)
{
	// replace non letter or digits by -
	$text = preg_replace('~[^\pL\d]+~u', '-', $text);

	// transliterate
	$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

	// remove unwanted characters
	$text = preg_replace('~[^-\w]+~', '', $text);

	// trim
	$text = trim($text, '-');

	// remove duplicate -
	$text = preg_replace('~-+~', '-', $text);

	// lowercase
	$text = strtolower($text);

	if (empty($text)) {
		return 'n-a';
	}

	return $text;
}




