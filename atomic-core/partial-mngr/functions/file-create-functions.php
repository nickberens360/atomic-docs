<?php
function createScssFile($catName, $fileName)
{
	
    $fileHandle = fopen('../scss/'.$catName.'/'.'_'.$fileName.'.scss', 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$fileName."{\n\n}");
	fclose($fileHandle);
}


function writeScssImportFile($catName, $fileName)
{
	
	//create @import string
	$importString = "@import " . '"' . $fileName . '";' ;
	$importString = "\n$importString\n";
	
	//open parent scss file and write @import string to it
	$fileHandle = fopen('../scss/'.$catName.'/'.'_'.$catName.'.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $importString);
  fclose($fileHandle);   
	
	//remove any extra line breaks from file
	file_put_contents('../scss/'.$catName.'/'.'_'.$catName.'.scss', implode(PHP_EOL, file('../scss/'.$catName.'/'.'_'.$catName.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));       
}



//creates component file
function createCompFile($catName, $fileName)
{
  
  $commentString = '<!--components/'.$catName.'/'.$fileName.'.php-->';
	$commentString = "\n$commentString\n";
	
  $fileHandle = fopen('../components/'.$catName.'/'.$fileName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $commentString);
  fclose($fileHandle);
  
  file_put_contents('../components/'.$catName.'/'.$fileName.'.php', implode(PHP_EOL, file('../components/'.$catName.'/'.$fileName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}



//creates include string and writes to component parent file
function createIncludeString($catName, $fileName)
{


	$includeString = '<span id="'.$fileName.'" class="compTitle">'.$fileName.'</span><div class="component"><?php include("../components/'.$catName.'/'.$fileName.'.php'.'");?></div>';
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('includes/_'.$catName.'.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('includes/_'.$catName.'.php', implode(PHP_EOL, file('includes/_'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}




//creates ajax form file
function createAjaxIncludeAndCompFile($catName, $fileName)
{
	
	$includeString = 
'<div class="ad_fileFormGroup">
	<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Rename <span class="ad_label__file">'.$fileName.'</span> component file</label>
          <button class="ad_btn ad_btn-pos" type="submit" >Rename</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="'.$catName.'"/>
      <input type="hidden" name="rename" value="rename"/>
      <input type="hidden" name="oldName" value="'.$fileName.'"/>
    </form>

	<form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formGroup">
        <div class="formInputGroup">
          <div class="inputBtnGroup">
            <label class="ad_label">Move <span class="ad_label__file">'.$fileName.'</span> to...</label>
            <button class="ad_btn ad_btn-pos" type="submit">Move</button>
            <div class="inputBtnGroup__inputWrap">
              <select class="form-control" name="newDir">
                <?php

                    $path = "../../../components";

                    $dir = new DirectoryIterator($path);
                    foreach ($dir as $fileinfo) {
                        if ($fileinfo->isDir() && !$fileinfo->isDot()) {
                            
                            echo \'<option value="\';

                            echo $fileinfo->getFilename();

                            echo \'">\';          

                            echo $fileinfo->getFilename();

                            echo \'</option>\';  
                        }
                    }
                ?>
              </select>
            </div>
          </div>  
        </div>
      </div>
      <input type="hidden" name="compDir" value="'.$catName.'"/>
      <input type="hidden" name="fileName" value="'.$fileName.'"/>
      <input type="hidden" name="moveFile" value="moveFile"/>
    </form>


    <form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <div class="formInputGroup">
        <div class="inputBtnGroup">
          <label class="ad_label">Type <span class="ad_label__file">'.$fileName.'</span> to delete the component files</label>
          <button class="ad_btn ad_btn-neg" type="submit" >Delete</button>
          <div class="inputBtnGroup__inputWrap"><input type="text" class="form-control" name="compName" placeholder="Must type component name" required></div>
        </div>  
      </div>
      <input type="hidden" name="compDir" value="'.$catName.'"/>
      <input type="hidden" name="delete" value="delete"/>
    </form>
</div>'		
;

	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('actions/'.$catName.'/_ajaxComp-'.$fileName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('actions/'.$catName.'/_ajaxComp-'.$fileName.'.php', implode(PHP_EOL, file('actions/'.$catName.'/_ajaxComp-'.$fileName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}


?>