<?php
require_once(dirname(__FILE__) .'/../../required.php');

global $Atomic;

if( Atomic::getValue('form') === 'component-create' ){
	require_once($Atomic::includePath() .'/inc/lib/Component.php');
	$Component = new Component();
	$created = $Component->create(Atomic::getValue('component'), Atomic::getValue('category'), Atomic::getValue('description'), Atomic::getValue('backgroundColor'));
	echo json_encode($created);
}
else {
	echo 'couldn\'t tell which form';
}