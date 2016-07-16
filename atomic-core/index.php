<?php
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');
error_reporting(E_ERROR | E_WARNING | E_PARSE);

require_once('required.php');

$router = new AltoRouter();

$router->map( 'GET', '/', function() {
	print 'here';
},'home');


$router->map( 'GET', '/atomic-core/', function() {
	require(__DIR__ . '/inc/view/home.php');
},'index');

// match current request url
$match = $router->match();

// call closure or throw 404 status
if( $match && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] );
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
