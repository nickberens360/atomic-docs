<?php

$f3 = \Base::instance();

$comp = $f3->get('comp');


$bgColor = $comp->backgroundColor;
$compId = $comp->componentId;

if(!empty($bgColor)){
    $bgClass = ' atomic-component-bg';
    $bgStyle = 'style="background: '.$bgColor.'"';
}
else{
    $bgClass = '';
    $bgStyle = '';
}


?>

<form class="ajax-form" action="<?= \Base::instance()->alias('editColorComponent', ['component' => $comp->componentId]); ?>">

    <input class="atomic-colorPicker" type="text" name="atomic-bgColor" value="<?= $bgColor ?>">

</form>