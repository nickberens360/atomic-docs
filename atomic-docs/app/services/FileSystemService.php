<?php

class FileSystemService {


    public function createCategory($catSlug){



	    $stylesDir = OptionService::getOption('stylesDir');
	    $stylesExt = OptionService::getOption('stylesExt');
	    $markupDir = OptionService::getOption('markupDir');




        $FileService = new FileService();

        $FileService->makeDirectory(
            FRONT . '/'.$markupDir.'/' . $catSlug
        );



        //Create style dir
        $FileService->makeDirectory(
            FRONT . '/'.$stylesDir.'/' . $catSlug
        );

        //Create style file
        $FileService->write(
            FRONT . '/'.$stylesDir.'/' . $catSlug . '/_' . $catSlug . '.'.$stylesExt,
            ''
        );


        //Write import string to root style file
        $importSting = '@import "' . $catSlug . '/_' . $catSlug . '";' . "\n";
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


    public function deleteCat($type, $catSlug) {
	    $markupDir = OptionService::getOption('markupDir');
	    $stylesDir = OptionService::getOption('stylesDir');
		if($type == 'markup' && !empty($catSlug)){
			$dir = FRONT . '/' .$markupDir. '/' .$catSlug;
			$this->rrmdir($dir);
		}
		if($type == 'styles' && !empty($catSlug)){
			$dir = FRONT . '/' .$stylesDir. '/' .$catSlug;
			$this->rrmdir($dir);
		}

    }




}