<li>
	<div class="atomic-link-grp">
		<span class="atomic-link-show atomic-link-show-utilities">+</span>
		<a class="atomic-link-main" href="atomic-core/utilities.php">Utilities</a>
	</div>
	<ul class="atoms-sub-menu atoms-sub-utilities">
	<li class="atomic-subform-group">
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
				<input type="hidden" name="compDir" value="<?php echo $dirOne;?>"/>
				<input type="hidden" name="create" value="create"/>
			</form>
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
				<input type="hidden" name="compDir" value="<?php echo $dirOne;?>"/>
				<input type="hidden" name="delete" value="delete"/>
			</form>
		</li>
	<?php
			$orig = "../components/$dirOne";
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
						echo "<li><a href= '#$filename'>$filename</a></li>";
					}
					}
					closedir($dir);
			}
		?>
		</ul>
</li>
<li>
	<div class="atomic-link-grp">
		<span class="atomic-link-show atomic-link-show-atoms">+</span>
		<a class="atomic-link-main" href="atomic-core/atoms.php">Atoms</a>
	</div>
	<ul class="atoms-sub-menu">
		<li class="atomic-subform-group">
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
				<input type="hidden" name="compDir" value="<?php echo $dirTwo;?>"/>
				<input type="hidden" name="create" value="create"/>
			</form>
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
				<input type="hidden" name="compDir" value="<?php echo $dirTwo;?>"/>
				<input type="hidden" name="delete" value="delete"/>
			</form>
		</li>
	<?php
			$orig = "../components/$dirTwo";
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
						echo "<li><a href= '#$filename'>$filename</a></li>";
					}
					}
					closedir($dir);
			}
		?>
		</ul>
</li>
<li>
	<div class="atomic-link-grp">
		<span class="atomic-link-show atomic-link-show-molecules">+</span>
		<a class="atomic-link-main" href="atomic-core/molecules.php">Molecules</a>
	</div>
	<ul class="atoms-sub-menu atoms-sub-molecules">
	<li class="atomic-subform-group">
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
				<input type="hidden" name="compDir" value="<?php echo $dirThree;?>"/>
				<input type="hidden" name="create" value="create"/>
			</form>
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
				<input type="hidden" name="compDir" value="<?php echo $dirThree;?>"/>
				<input type="hidden" name="delete" value="delete"/>
			</form>
		</li>
		<?php
				$orig = "../components/$dirThree";
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
							echo "<li><a href= '#$filename'>$filename</a></li>";
						}
						}
						closedir($dir);
				}
			?>
		</ul>
</li>
<li>
	<div class="atomic-link-grp">
		<span class="atomic-link-show atomic-link-show-organisms">+</span>
		<a class="atomic-link-main" href="atomic-core/organisms.php">Organisms</a>
	</div>
	<ul class="atoms-sub-menu atoms-sub-molecules">
	<li class="atomic-subform-group">
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
				<input type="hidden" name="compDir" value="<?php echo $dirFour;?>"/>
				<input type="hidden" name="create" value="create"/>
			</form>
			<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
				<input type="hidden" name="compDir" value="<?php echo $dirFour;?>"/>
				<input type="hidden" name="delete" value="delete"/>
			</form>
		</li>
		<?php
				$orig = "../components/$dirFour";
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
							echo "<li><a href= '#$filename'>$filename</a></li>";
						}
						}
						closedir($dir);
				}
			?>
		</ul>
</li>
<li>
		<div class="atomic-link-grp">
			<span class="atomic-link-show atomic-link-show-new3">+</span>
			<a class="atomic-link-main" href="atomic-core/new3.php">new3</a>
		</div>
		<ul class="atoms-sub-menu atoms-sub-new3">
		<li class="atomic-subform-group">
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
					<input type="hidden" name="compDir" value="new3"/>
					<input type="hidden" name="create" value="create"/>
				</form>
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
					<input type="hidden" name="compDir" value="new3"/>
					<input type="hidden" name="delete" value="delete"/>
				</form>
		</li>
		<?php
			$orig = "../components/new3";
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
			echo "<li><a href='#$filename'>$filename</a></li>";
			}
			}
			closedir($dir);
			}
		?>
		</ul>
</li>