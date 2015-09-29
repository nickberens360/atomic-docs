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
'<li class=" <?php if ($current_page == "'.$catName.'.php"){ echo "active "; }?>">
		<div class="atomic-link-grp">
			<i class="atomic-link-show  fa fa-folder-o"></i>
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

	$includeString = "\n$includeString\n";
	
	$fileHandle = fopen('includes/_sidebar.php', 'a') or die("can't open file");
	fwrite($fileHandle, $includeString);
	
	file_put_contents('includes/_sidebar.php', implode(PHP_EOL, file('includes/_sidebar.php', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)));
	
}


?>