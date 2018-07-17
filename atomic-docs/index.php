<?php
$f3 = require('fatfree/lib/base.php');


$f3->config('config.ini');
$f3->config('routes.ini');

require_once 'functions.php';


$f3->run();