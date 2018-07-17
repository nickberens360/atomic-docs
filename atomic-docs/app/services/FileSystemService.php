<?php

class FileSystemService {


    public function createCategory($catName){


        $option = OptionService::get();

        $stylesDir = $option->stylesDir;
        $stylesExt = $option->stylesExt;
        $markupDir = $option->markupDir;




        $FileService = new FileService();

        $FileService->makeDirectory(
            FRONT . '/'.$markupDir.'/' . $catName
        );



        //Create style dir
        $FileService->makeDirectory(
            FRONT . '/'.$stylesDir.'/' . $catName
        );

        //Create style file
        $FileService->write(
            FRONT . '/'.$stylesDir.'/' . $catName . '/_' . $catName . '.'.$stylesExt,
            ''
        );


        //Write import string to root style file
        $importSting = '@import "' . $catName . '/_' . $catName . '";' . "\n";
        $mainScssFile = FRONT . '/'.$stylesDir.'/main.'.$stylesExt;
        $FileService->write($mainScssFile, $importSting);
    }

    public function recurse_copy($src,$dst) {
        $dir = opendir($src);
        @mkdir($dst);
        while(false !== ( $file = readdir($dir)) ) {
            if (( $file != '.' ) && ( $file != '..' )) {
                if ( is_dir($src . '/' . $file) ) {
                    $this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
                }
                else {
                    copy($src . '/' . $file,$dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    public function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir."/".$object))
                        $this->rrmdir($dir."/".$object);
                    else
                        unlink($dir."/".$object);
                }
            }
            rmdir($dir);
        }
    }




}