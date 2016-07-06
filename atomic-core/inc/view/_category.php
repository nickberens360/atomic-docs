<?php
global $Atomic;
require_once(Atomic::includePath() . '/inc/lib/FllatCategory/FllatCategory.php');

$FllatComponent = new FllatComponent();
$category = Atomic::receive('viewCategory');
$components = $FllatComponent->where('category', $category);


//var_dump($components);

foreach($components as $component){
	Atomic::give('component', $component);
	Atomic::partial('component');
}
