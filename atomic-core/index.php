<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('required.php');

global $_ROUTE;

$router = new AltoRouter();


$router->map( 'GET', '/atomic-core/[a:category]', function() {
	require(__DIR__ . '/inc/view/home.php');
});

$router->map( 'GET', '/atomic-core/', function() {
	require(__DIR__ . '/inc/view/home.php');
});

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	$_ROUTE = $match;
	call_user_func_array( $match['target'], $match['params'] );
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
