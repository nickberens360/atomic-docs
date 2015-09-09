
<li>
		<div class="atomic-link-grp">
			<span class="atomic-link-show atomic-link-show-test2">+</span>
			<a class="atomic-link-main" href="atomic-core/test2.php">test2</a>
		</div>
		<ul class="atoms-sub-menu atoms-sub-test2">
		<li class="atomic-subform-group">
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Create Component">
					<input type="hidden" name="compDir" value="test2"/>
					<input type="hidden" name="create" value="create"/>
				</form>
				<form class="atomic-sub-form " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
					<input type="text" class="form-control" id="inputDefault" name="compName" placeholder="Delete Component">
					<input type="hidden" name="compDir" value="test2"/>
					<input type="hidden" name="delete" value="delete"/>
				</form>
		</li>
		<?php
			$orig = "../components/test2";
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