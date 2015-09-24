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
'<li class=" <?php if ($current_page == "'.$catName.'.php"){ echo "active "; }?>">
		<div class="atomic-link-grp">
			<span class="atomic-link-show atomic-link-show-'.$catName.'">+</span>
			<a class="atomic-link-main" href="atomic-core/'.$catName.'.php">'.$catName.'</a>
		</div>
		<ul class="atoms-sub-menu atoms-sub-'.$catName.'">
		<li class="atomic-subform-group">
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component" required>
					<input type="hidden" name="compDir" value="'.$catName.'"/>
					<input type="hidden" name="create" value="create"/>
				</form>
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component" required>
					<input type="hidden" name="compDir" value="'.$catName.'"/>
					<input type="hidden" name="delete" value="delete"/>
				</form>
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
			echo "<li><a href=\'#$filename\'>$filename</a></li>";
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







?>