<?php

//helper functions
function scssPath($catName)
{
	$path = '../../scss/'.$catName;
	return $path;
}
function scssFullFile($fileName)
{
	$fullFile = '_'.$fileName.'.scss';
	return $fullFile;
}

function compPath($catName)
{
	$path = '../../components/'.$catName;
	return $path;
}
function compFullFile($fileName)
{
	$fullFile = $fileName.'.php';
	return $fullFile;
}






function createScssFile($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	
  $fileHandle = fopen($path.'/'.$fullFile, 'x+') or die("can't open file");
	fwrite($fileHandle, ".".$fileName."{\n\n}");
	fclose($fileHandle);
}


function importScssFile($catName, $fileName)
{
	
	//create @import string
	$importString = "@import " . '"' . $fileName . '";' ;
	$importString = "\n$importString\n";
	
	//open parent scss file and write @import string to it
	$path = scssPath($catName);
	$fileHandle = fopen($path.'/'.'_'.$catName.'.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $importString);
  fclose($fileHandle);   
	
	//remove any extra line breaks from file
	file_put_contents($path.'/'.'_'.$catName.'.scss', implode(PHP_EOL, file($path.'/'.'_'.$catName.'.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));       
}

//creates component file
function createCompFile($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	
  $fileHandle = fopen($path.'/'.$fullFile, 'x+') or die("can't open file");
	fclose($fileHandle);
}


//creates include string and writes to component parent file
function createIncludeString($catName, $fileName)
{
	$fullFile = compFullFile($fileName);
	$includeString = '<span id="'.$fileName.'"></span><div class="component"><?php include("../components/'.$catName.'/'.$fullFile.'");?></div>';
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('../includes/_'.$catName.'.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('../includes/_'.$catName.'.php', implode(PHP_EOL, file('../includes/_'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}




function deleteScssImportString($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	//create @import string
	$importString = "@import " . '"' . $fileName . '";' ;
	//Place contents of file into variable
	$contents = file_get_contents($path.'/_'.$catName.'.scss');
	$contents = str_replace($importString, "", $contents);
	$contents = file_put_contents($path.'/_'.$catName.'.scss', $contents);
}


function deleteScssFile($catName, $fileName)
{
	$path = scssPath($catName);
	$fullFile = scssFullFile($fileName);
	$fullFile = '/'.$fullFile;
	unlink($path.$fullFile);
}




function deleteCompIncludetString($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	
	//create @import string
	$includeString = '<span id="'.$fileName.'"></span><div class="component"><?php include("../components/'.$catName.'/'.$fullFile.'");?></div>';
	//Place contents of file into variable
	$contents = file_get_contents('../includes/_'.$catName.'.php');
	
	$contents = str_replace($includeString, "", $contents);
	$contents = file_put_contents('../includes/_'.$catName.'.php', $contents);
}


function deleteCompFile($catName, $fileName)
{
	$path = compPath($catName);
	$fullFile = compFullFile($fileName);
	$fullFile = '/'.$fullFile;
	unlink($path.$fullFile);
}









function createScssCatDirAndFile($catName)
{
	mkdir("../../scss/$catName");
	$fileHandle = fopen("../../scss/$catName/_$catName.scss", 'x+') or die("can't open file");
}


function createCompCatDir($catName)
{
	mkdir("../../components/$catName");
}




function createPageTemplate($catName)
{

	
	$includeString = 
	'
<?php include ("head.php");?>
	<body class="'.$catName.'">
	
	
	<div class="grid-row atoms-container">
			<?php include ("sidebar.php");?>
			
			
			<div class="atoms-main">
					<h1 id="atoms" class="atomic-h1">'.$catName.'</h1>
	
	
							<?php include ("includes/_'.$catName.'.php");?>
	
	
			</div>
	</div>
	
	<?php include ("footer.php");?>
'
	;
	
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('../'.$catName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('../'.$catName.'.php', implode(PHP_EOL, file('../'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
	
}







function createSidebarIncludeAndFile($catName)
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

	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('../includes/_sidebar.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('../includes/_sidebar.php', implode(PHP_EOL, file('../includes/_sidebar.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}






?>