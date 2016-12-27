<?php

function recurse_copy($src,$dst) {
    $dir = opendir($src);
    @mkdir($dst);
    while(false !== ( $file = readdir($dir)) ) {
        if (( $file != '.' ) && ( $file != '..' )) {
            if ( is_dir($src . '/' . $file) ) {
                recurse_copy($src . '/' . $file,$dst . '/' . $file);
            }
            else {
                copy($src . '/' . $file,$dst . '/' . $file);
            }
        }
    }
    closedir($dir);
}


function delete_files($dir) {
    if (is_dir($dir)) {
        $objects = scandir($dir);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (filetype($dir."/".$object) == "dir")
                    delete_files($dir."/".$object);
                else unlink   ($dir."/".$object);
            }
        }
        reset($objects);
        rmdir($dir);
    }
}

function getConfig($path_to_db='')
{


    $settings = new Fllat("settings", __DIR__."/../atomic-db");
    $settings = $settings->select(array());

    foreach($settings[0] as $key=>$val){
        if(strpos($key,'directory')!==false){
            $settings[0][$key]='tmp/'.session_id().'/'.$val;
        }
    }

    return $settings;
}

session_start();
if(!file_exists(__DIR__.'/../tmp/'.session_id())){
    if(!file_exists(__DIR__.'/../tmp')) mkdir(__DIR__.'/../tmp/');
    mkdir(__DIR__.'/../tmp/'.session_id());
    recurse_copy(__DIR__.'/../scss',__DIR__.'/../tmp/'.session_id().'/scss');
    recurse_copy(__DIR__.'/../css',__DIR__.'/../tmp/'.session_id().'/css');
    recurse_copy(__DIR__.'/../js',__DIR__.'/../tmp/'.session_id().'/js');
    recurse_copy(__DIR__.'/../components',__DIR__.'/../tmp/'.session_id().'/components');

    /** Delete old tmp folders */
    $files = glob(__DIR__.'/../tmp/'."*");
    $now   = time();

    foreach ($files as $file)
        if (is_dir($file))
            if ($now - filemtime($file) >= 60 * 60 * 1 ) // 1 hour
                delete_files($file);
}

