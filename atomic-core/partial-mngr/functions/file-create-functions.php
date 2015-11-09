<?php
function createScssFile($catName, $fileName)
{
	
    $fileHandle = fopen('../scss/'.$catName.'/'.'_'.$fileName.'.scss', 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$fileName."{\n\n}");
	fclose($fileHandle);
}


function importScssFile($catName, $fileName)
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

	
  $fileHandle = fopen('../components/'.$catName.'/'.$fileName.'.php', 'x+') or die("can't open file");
	fclose($fileHandle);
}



//creates include string and writes to component parent file
function createIncludeString($catName, $fileName)
{


	$includeString = '<span id="'.$fileName.'"></span><div class="component"><?php include("../components/'.$catName.'/'.$fileName.'.php'.'");?></div>';
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('includes/_'.$catName.'.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('includes/_'.$catName.'.php', implode(PHP_EOL, file('includes/_'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}

//creates ajax form file
function createAjaxIncludeAndCompFile($catName, $fileName)
{
	
	$includeString = 
'<li class="ad_fileFormGroup">
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/index.php" method="post">
      <input type="text" class="form-control" name="compName" placeholder="Delete Component" required>
      <input type="hidden" name="compDir" value="'.$catName.'"/>
      <input type="hidden" name="delete" value="delete"/>
    </form>
</li>'		
;

	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('includes/_ajaxComp-'.$fileName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('includes/_ajaxComp-'.$fileName.'.php', implode(PHP_EOL, file('includes/_ajaxComp-'.$fileName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}


?>