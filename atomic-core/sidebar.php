
<?php include ("partial-mngr/config.php");?>

<span class="atoms-side_show">Show</span>
<aside class="atoms-side">
<div class="control-panel">
</div>	
<div class="atoms-side_options">
	<span class="atoms-side_hide">Hide Sidebar</span>
	<span class="atoms-panel_show">Generator</span>
</div>

	<nav>
		<ul class="atoms-nav">
			<li class="atom-side_head"><a href="#">Components</a></li>
			<li><a href="utilities.php">Utilities</a>
				<ul class="atoms-sub-menu atoms-sub-utilities">
				<?php
						$orig = "$compRoot/$partialDirFour";
						
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
				
			<li><a href="atoms.php">Atoms</a>
				<ul class="atoms-sub-menu atoms-sub-atoms">
<<<<<<< Updated upstream
=======
					<li>
						<form class="atomic-sub-form form-inline " action="atomic-core/partial-mngr/class.php" method="post">
							<input type="text" class="form-control" id="inputDefault" name="modName">
							<button type="Submit" class="btn btn-primary">Create</button>
							<input type="hidden" name="partialDir" value="<?php echo $partialDirOne;?>"/>
							<input type="hidden" name="path" value="<?php echo $partDirOnePath;?>"/>
							<input type="hidden" name="compPath" value="<?php echo $compDirOnePath;?>"/>
						</form>
						<?php /*?><form class="atomic-sub-form form-inline" action="atomic-core/partial-mngr/delete-mod.php" method="post">
							<input type="text" class="form-control" id="inputDefault" name="partialName">
							<input type="hidden" name="partialDir" value="<?php echo $partialDirOne;?>"/>
							<button type="Submit" class="btn btn-danger">Delete</button>
						</form><?php */?>
					</li>
>>>>>>> Stashed changes
				<?php
						$orig = "$compRoot/$partialDirOne";
						
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
				
			<li><a href="molecules.php">Molecules</a>
				<ul class="atoms-sub-menu atoms-sub-molecules">
					<?php
							$orig = "$compRoot/$partialDirTwo";
							
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
					
			<li><a href="organisms.php">Organisms</a>
				<ul class="atoms-sub-menu atoms-sub-organisms">
					<?php
							$orig = "$compRoot/$partialDirThree";
							
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
			
			<li class="atom-side_head"><a href="#">Misc</a></li>
			<li><a href="atomic-core/partial-mngr/index.php" target="_blank">Component MNGR</a></li>
		</ul>
	</nav>
</aside>