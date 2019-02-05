<?php

class OptionController extends Controller {



    function updateSidebar($f3, $params)
    {

	    $sideState = OptionService::getOption('sidebar');

	    $result = $sideState ? 0 : 1;

	    OptionService::updateOption( 'sidebar', $result );

    }





}