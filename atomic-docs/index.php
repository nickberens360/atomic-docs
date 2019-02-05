<?php
$f3 = require('fatfree/lib/base.php');


$f3->config('config.ini');
$f3->config('routes.ini');

require_once 'functions.php';


\Template::instance()->filter('baseAlias', 'baseAlias');

\Template::instance()->filter('incFilter', 'incFilter');

\Template::instance()->filter('iFramePath', 'iFramePath');






$f3->run();