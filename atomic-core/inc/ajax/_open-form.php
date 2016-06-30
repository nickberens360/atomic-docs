<?php
require_once(dirname(__FILE__) .'/../../required.php');

global $Atomic;

//print_r($Atomic->config);
if( isset($_GET['form']) && !empty($_GET['form']) ){
//	print_r($Atomic->config);
	include ($Atomic->config['atomicCorePath'] .'/inc/view/_form.php');
}
else {
	echo 'couldn\'t tell which form';
}