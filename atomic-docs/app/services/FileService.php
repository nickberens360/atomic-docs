<?php





class FileService {




    public function write($filePath, $content){

        $this->makeFile($filePath);

        file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
    }

    public function makeDirectory($filePath){

        if (!file_exists($filePath)) {
            mkdir($filePath, 0777, true);
        }
    }

    public function makeFile($filePath){
        if (!file_exists($filePath)) {
            fopen($filePath, 'w') or die('Cannot open file:  '.$filePath);
        }
    }

    public function editName($oldPath, $newPath){
        rename($oldPath,$newPath);
    }


    public function stringReplace($path, $oldString, $newString){
        $contents = file_get_contents($path);
        $contents = str_replace($oldString, $newString, $contents);
        file_put_contents($path, $contents);
    }





    public function globFindReplace($path, $oldString, $newString){
        foreach (glob($path) as $filename) {
            $this->stringReplace($filename, $oldString, $newString);
        }

    }


	public function deleteFile($path){
		unlink($path);
	}













	public function stringBuilder($type, $dirPath, $name){


		$stylesDir = OptionService::getOption( 'stylesDir' );
		$stylesExt = OptionService::getOption( 'stylesExt' );
		$markupDir = OptionService::getOption( 'markupDir' );
		$markupExt = OptionService::getOption( 'markupExt' );
		$jsDir     = OptionService::getOption( 'jsDir' );
		$jsExt     = OptionService::getOption( 'jsExt' );





    	if($type == "styleImport"){
    		if($dirPath == null){
			    $string = '@import "_'.$name.'";';
		    }
    		else{
			    $string = '@import "'.$dirPath.'/_'.$name.'";';
		    }

	    }

    	return $string;

	}


}