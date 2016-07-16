<?php
require_once(dirname(__FILE__) . '/inc/lib/Atomic.php');
require_once(Atomic::includePath() . '/inc/functions.php');

require_once(Atomic::includePath() . '/vendor/AltoRouter/AltoRouter.php');

global $Atomic;

$Atomic = new Atomic();
