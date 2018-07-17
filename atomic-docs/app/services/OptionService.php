<?php

class OptionService {

    /** @var OptionModel  */
    static private $option = null;

    /**
     * @return OptionModel
     */
    static public function get()
    {

        if(self::$option===null){
            $f3=Base::instance();



            self::$option = new OptionModel($f3->get('db'));

            self::$option->load();
        }

        return self::$option;

    }

}