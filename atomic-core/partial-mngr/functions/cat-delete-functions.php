<?php




function deleteCatPageFile($catName)
{
	unlink('../'.$catName.'.php');
}

function deleteCatIncludeFile($catName)
{
	unlink('../includes/_'.$catName.'.php');
}







function deleteSidebarIncludeString($catName)
{
	
$includeString = 
'<li>
		<div class="atomic-link-grp">
			<span class="atomic-link-show atomic-link-show-'.$catName.'">+</span>
			<a class="atomic-link-main" href="atomic-core/'.$catName.'.php">'.$catName.'</a>
		</div>
		<ul class="atoms-sub-menu atoms-sub-'.$catName.'">
		<li class="atomic-subform-group">
				<form class="atomic-sub-form " action="atomic-core/partial-mngr/create.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
					<input type="hidden" name="compDir" value="'.$catName.'"/>
				</form>
				<form class="atomic-sub-form " action="atomic-core/partial-mngr/delete.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
					<input type="hidden" name="compDir" value="'.$catName.'"/>
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
	$contents = file_get_contents('../includes/_sidebar.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('../includes/_sidebar.php', $contents);
}




?>