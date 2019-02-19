<?php

use DB\SQL;

$f3 = require('fatfree/lib/base.php');

$f3->config('config.ini');
$f3->config('routes.ini');

require_once 'vendor/autoload.php';
require_once 'functions.php';

\Template::instance()->filter('baseAlias', 'baseAlias');
\Template::instance()->filter('incFilter', 'incFilter');
\Template::instance()->filter('fileContents', 'infileContentscFilter');
\Template::instance()->filter('iFramePath', 'iFramePath');
\Template::instance()->filter('navWalker', 'navWalker');
\Template::instance()->filter('p', 'p');

$db = new DB\SQL(
	$f3->get('devdb'), '', '',
	[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
);

$f3->set('db', $db);

$f3->run();
