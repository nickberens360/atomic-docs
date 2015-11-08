<li class="ad_dir <?php if ($current_page == "test.php"){ echo "active "; }?>">
		<div class="ad_dir__dirNameGroup">
			<i class="ad_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="ad_dir__dirNameGroup__name" href="atomic-core/test.php">test</a>
		</div>
		<ul class="ad_fileSection atoms-sub-test">
			<li class="ad_fileFormGroup">
					<form class="ad_fileForm " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" class="form-control" name="compName" placeholder="Create Component" required>
						<input type="hidden" name="compDir" value="test"/>
						<input type="hidden" name="create" value="create"/>
					</form>
					<form class="ad_fileForm " action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						<input type="text" class="form-control" name="compName" placeholder="Delete Component" required>
						<input type="hidden" name="compDir" value="test"/>
						<input type="hidden" name="delete" value="delete"/>
					</form>
			</li>
			<?php
				$orig = "../components/test";
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