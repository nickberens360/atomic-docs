<?php include 'config.php'; ?>
<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Partial MNGR</title>
<link rel="stylesheet" href="../css/main.css?v=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/superhero/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<style>
.well {
	background: rgb(31, 34, 53);
}
</style>
<link rel="stylesheet" type="text/css" href="app.css">
</head>
<body>
<div class="grid-row container">
	<h1>Sass Partial MNGR</h1>
	<div class="nb-4">
		<div class="modules well">
			<h1><?php echo $partialDirOne;?></h1>
			<div class="mod-create">
				<h3>Create Module</h3>
				<form class="form-box form-inline " action="create-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="modName">
					<button type="Submit" class="btn btn-primary">Create</button>
					<input type="hidden" name="partialDir" value="<?php echo $partialDirOne;?>"/>
					<input type="hidden" name="path" value="<?php echo $partDirOnePath;?>"/>
					<input type="hidden" name="compPath" value="<?php echo $compDirOnePath;?>"/>
				</form>
			</div>
			
			<div class="mod-delete">
				<h3>Delete Module</h3>
				<form class="form-box form-inline" action="delete-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="partialName">
					<input type="hidden" name="partialDir" value="<?php echo $partialDirOne;?>"/>
					<button type="Submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
			<div class="mod-list"> <br/>
				<h4>Modules List</h4>
				<?php
					$orig = $partDirOnePath;
					if ($dir = opendir($orig)) {
			
			
							while ($file = readdir($dir)) {
							$ok = "true";
							$filename = $file;
							if ($file == "."){
							$ok = "false";
							}
							else if ($file == ".."){
							$ok = "false";
							}
							if ($ok == "true"){
								echo "<a href= '/$root/$partialDirOne/$file'>$filename</a>";
							echo "<br>";
							}
							}
			
							closedir($dir);
					}
				?>
			</div>
		</div>
	</div>
	<div class="nb-4">
		<div class="modules well">
			<h1><?php echo $partialDirTwo;?></h1>
			<div class="mod-create">
				<h3>Create Module</h3>
				<form class="form-box form-inline " action="create-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="modName">
					<button type="Submit" class="btn btn-primary">Create</button>
					<input type="hidden" name="partialDir" value="<?php echo $partialDirTwo;?>"/>
					<input type="hidden" name="path" value="<?php echo $partDirTwoPath;?>"/>
					<input type="hidden" name="compPath" value="<?php echo $compDirTwoPath;?>"/>
				</form>
			</div>
			<div class="mod-delete">
				<h3>Delete Module</h3>
				<form class="form-box form-inline" action="delete-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="partialName">
					<input type="hidden" name="partialDir" value="<?php echo $partialDirTwo;?>"/>
					<button type="Submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
			<div class="mod-list"> <br/>
				<h4>Modules List</h4>
				<?php
    $orig = $partDirTwoPath;
    if ($dir = opendir($orig)) {


        while ($file = readdir($dir)) {
        $ok = "true";
        $filename = $file;
        if ($file == "."){
        $ok = "false";
        }
        else if ($file == ".."){
        $ok = "false";
        }
        if ($ok == "true"){
          echo "<a href= '/$root/$partialDirTwo/$file'>$filename</a>";
        echo "<br>";
        }
        }

        closedir($dir);
    }
    ?>
			</div>
		</div>
	</div>
	<div class="nb-4">
		<div class="modules well">
			<h1><?php echo $partialDirThree;?></h1>
			<div class="mod-create">
				<h3>Create Module</h3>
				<form class="form-box form-inline " action="create-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="modName">
					<button type="Submit" class="btn btn-primary">Create</button>
					<input type="hidden" name="partialDir" value="<?php echo $partialDirThree;?>"/>
					<input type="hidden" name="path" value="<?php echo $partDirThreePath;?>"/>
					<input type="hidden" name="compPath" value="<?php echo $compDirThreePath;?>"/>
				</form>
			</div>
			<div class="mod-delete">
				<h3>Delete Module</h3>
				<form class="form-box form-inline" action="delete-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="partialName">
					<input type="hidden" name="partialDir" value="<?php echo $partialDirThree;?>"/>
					<button type="Submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
			<div class="mod-list"> <br/>
				<h4>Modules List</h4>
				<?php
    $orig = $partDirThreePath;
    if ($dir = opendir($orig)) {


        while ($file = readdir($dir)) {
        $ok = "true";
        $filename = $file;
        if ($file == "."){
        $ok = "false";
        }
        else if ($file == ".."){
        $ok = "false";
        }
        if ($ok == "true"){
          echo "<a href= '/$root/$partialDirTwo/$file'>$filename</a>";
        echo "<br>";
        }
        }

        closedir($dir);
    }
    ?>
			</div>
		</div>
	</div>
</div>

<!--dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd-->

<div class="grid-row container">
	<div class="nb-4">
		<div class="modules well">
			<h1><?php echo $partialDirFour;?></h1>
			<div class="mod-create">
				<h3>Create Module</h3>
				<form class="form-box form-inline " action="create-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="modName">
					<button type="Submit" class="btn btn-primary">Create</button>
					<input type="hidden" name="partialDir" value="<?php echo $partialDirFour;?>"/>
					<input type="hidden" name="path" value="<?php echo $partDirFourPath;?>"/>
					<input type="hidden" name="compPath" value="<?php echo $compDirFourPath;?>"/>
				</form>
			</div>
			<div class="mod-delete">
				<h3>Delete Module</h3>
				<form class="form-box form-inline" action="delete-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="partialName">
					<input type="hidden" name="partialDir" value="<?php echo $partialDirFour;?>"/>
					<button type="Submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
			<div class="mod-list"> <br/>
				<h4>Modules List</h4>
				<?php
    $orig = $partDirFourPath;
    if ($dir = opendir($orig)) {
        while ($file = readdir($dir)) {
        $ok = "true";
        $filename = $file;
        if ($file == "."){
        $ok = "false";
        }
        else if ($file == ".."){
        $ok = "false";
        }
        if ($ok == "true"){
          echo "<a href= '/$root/$partialDirFour/$file'>$filename</a>";
        echo "<br>";
        }
        }
        closedir($dir);
    }
    ?>
			</div>
		</div>
	</div>
	<div class="nb-4">
		<div class="modules well">
			<h1><?php echo $partialDirFive;?></h1>
			<div class="mod-create">
				<h3>Create Module</h3>
				<form class="form-box form-inline " action="create-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="modName">
					<button type="Submit" class="btn btn-primary">Create</button>
					<input type="hidden" name="partialDir" value="<?php echo $partialDirFive;?>"/>
					<input type="hidden" name="path" value="<?php echo $partDirFivePath;?>"/>
					<input type="hidden" name="compPath" value="<?php echo $compDirFivePath;?>"/>
				</form>
			</div>
			<div class="mod-delete">
				<h3>Delete Module</h3>
				<form class="form-box form-inline" action="delete-mod.php" method="post">
					<input type="text" class="form-control" id="inputDefault" name="partialName">
					<input type="hidden" name="partialDir" value="<?php echo $partialDirFive;?>"/>
					<button type="Submit" class="btn btn-danger">Delete</button>
				</form>
			</div>
			<div class="mod-list"> <br/>
				<h4>Modules List</h4>
				<?php
    $orig = $partDirFivePath;
    if ($dir = opendir($orig)) {


        while ($file = readdir($dir)) {
        $ok = "true";
        $filename = $file;
        if ($file == "."){
        $ok = "false";
        }
        else if ($file == ".."){
        $ok = "false";
        }
        if ($ok == "true"){
          echo "<a href= '/$root/$partialDirFive/$file'>$filename</a>";
        echo "<br>";
        }
        }

        closedir($dir);
    }
    ?>
			</div>
		</div>
	</div>
</div>
</body>
</html>