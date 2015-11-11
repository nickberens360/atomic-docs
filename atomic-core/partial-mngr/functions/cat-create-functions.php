<?php
function createPageIncludeFile($catName)
{
	fopen("includes/_$catName.php", 'x+') or die("can't open file");
}
function createScssCatDirAndFile($catName)
{
	mkdir("../scss/$catName");
	$fileHandle = fopen("../scss/$catName/_$catName.scss", 'x+') or die("can't open file");
}
function createStringForMainScssFile($catName)
{
	$includeString ='@import "'.$catName.'/'.$catName.'";'; 
	
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('../scss/main.scss', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('../scss/main.scss', implode(PHP_EOL, file('../scss/main.scss', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
}
function createCompCatDir($catName)
{
	mkdir("../components/$catName");
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
					<h1 id="'.$catName.'" class="atomic-h1">'.$catName.'</h1>
	
	
							<?php include ("includes/_'.$catName.'.php");?>
              
	
	
			</div>
	</div>
	<div class="ad_js-actionDrawer ad_actionDrawer">
    <div class="ad_js-actionClose">Close</div>
    <div id="js_actionDrawer__content"></div>
  </div>
	<?php include ("footer.php");?>
'
	;
	
	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen($catName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents($catName.'.php', implode(PHP_EOL, file($catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
	
}


function createSidebarIncludeAndFile($catName)
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

	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('includes/_sidebar.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('includes/_sidebar.php', implode(PHP_EOL, file('includes/_sidebar.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}






function createAjaxIncludeAndFile($catName)
{
	
	$includeString = 
'<li class="ad_fileFormGroup">
    <form class="ad_fileForm " action="/atomic-docs/atomic-core/'.$catName.'.php" method="post">
      <input type="text" class="form-control" name="compName" placeholder="Create Component" required>
      <input type="hidden" name="compDir" value="'.$catName.'"/>
      <input type="hidden" name="create" value="create"/>
    </form>
</li>'		
;

	$includeString = "\n$includeString\n";
  
  
  mkdir("actions/$catName");
	
	$fileHandle = fopen('actions/'.$catName.'/_ajax-'.$catName.'.php', 'x+') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('actions/'.$catName.'/_ajax-'.$catName.'.php', implode(PHP_EOL, file('actions/'.$catName.'/_ajax-'.$catName.'.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}





?>