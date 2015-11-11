<?php




function deleteCatPageFile($catName)
{
	unlink($catName.'.php');
}

function deleteCatSidebarIncludeFile($catName)
{
	unlink('includes/_'.$catName.'.php');
}

function deleteCompDir($catName) { 
		
   $catName = '../components/'.$catName;
	
   if (is_dir($catName)) { 
     $objects = scandir($catName); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($catName."/".$object) == "dir") deleteCompDir($catName."/".$object); else unlink($catName."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($catName); 
   } 
} 


function deleteSidebarIncludeString($catName)
{
	
$includeString = 
'<li class="ad_dir <?php if ($current_page == "'.$catName.'.php"){ echo "active "; }?>">
		<div class="ad_dir__dirNameGroup">
			<i class="ad_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="ad_dir__dirNameGroup__name" href="atomic-core/'.$catName.'.php">'.$catName.'</a>
		</div>
		<ul class="ad_fileSection">
      <li class="ad_addFileItem">
        <a class="ad_addFile ad_js-actionOpen ad_actionBtn" href="atomic-core/actions/'.$catName.'/_ajax-'.$catName.'.php"><span class="fa fa-plus"></span> Add File</a>
      </li>
			<?php
				$orig = "../components/'.$catName.'";
				if ($dir = opendir($orig)) {
				while ($file = readdir($dir)) {
				$ok = "true";	
				$filename = $file;
				$filename = basename($filename, ".php");
				if ($file == "."){
				$ok = "false";
				}
				else if ($file == ".."){
				$ok = "false";	
				}
				if ($ok == "true"){
				echo "<li class=\'ad_fileSection__file\'><a class=\'ad_js-actionOpen ad_actionBtn fa fa-pencil-square-o\' href=\'atomic-core/actions/'.$catName.'/_ajaxComp-$filename.php\'></a><a href=\'#$filename\'>$filename</a></li>";
				}
				}
				closedir($dir);
				}
			?>
		</ul>
</li>'		
;

	//Place contents of file into variable
	$contents = file_get_contents('includes/_sidebar.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('includes/_sidebar.php', $contents);
}



function deleteCatScssImportString($catName)
{
	
	$importString ='@import "'.$catName.'/'.$catName.'";';
		
	//Place contents of file into variable
	$contents = file_get_contents('../scss/main.scss');
	
	$contents = str_replace($importString, "", $contents);
	$contents = file_put_contents('../scss/main.scss', $contents);
}



function deleteScssDir($catName) { 
		
	
   if (is_dir('../scss/'.$catName)) { 
     $objects = scandir('../scss/'.$catName); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($catName."/".$object) == "dir") deleteScssDir('../scss/'.$catName."/".$object); else unlink('../scss/'.$catName."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir('../scss/'.$catName); 
   } 
} 




function deleteAjaxDir($catName) { 
		
   $catName = 'actions/'.$catName;
	
   if (is_dir($catName)) { 
     $objects = scandir($catName); 
     foreach ($objects as $object) { 
       if ($object != "." && $object != "..") { 
         if (filetype($catName."/".$object) == "dir") deleteCompDir($catName."/".$object); else unlink($catName."/".$object); 
       } 
     } 
     reset($objects); 
     rmdir($catName); 
   } 
} 



//function deleteAjaxFile($inputName)
//{
//	unlink('actions/_ajax-'.$inputName.'.php');
//  
//}




?>