<?php

class OptionController extends Controller {



    function updateSidebar($f3, $params)
    {


        $option = new OptionModel($this->db);

        $option->load();

        $sideState = $option->sidebar;


        if($sideState == 0 ){
            $option->sidebar = 1;
        }
        else{
            $option->sidebar = 0;
        }

        $option->save();



    }




}