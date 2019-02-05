<?php

/** @var componentId int */

class HomeController extends Controller{

	function indexAction($f3, $params){

		$titleTag = 'Atomic Docs';


		$this->f3->set('title', $titleTag);


        if (!$catComps){
            $catComps = [];
        }
        $f3->set('catComponents', $catComps);




		echo \Template::instance()->render('home/index.htm');


	}



}