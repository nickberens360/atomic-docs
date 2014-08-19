<?php include ("partial-mngr/config.php");?>
<span class="atoms-side_show">Show</span>
<aside class="atoms-side">
<span class="atoms-side_hide">Hide Sidebar</span>
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
<<<<<<< HEAD
			<li><a href="partial-mngr/index.php" target="_blank">Component MNGR</a></li>
=======
			<li><a href="partial-mngr" target="_blank">Partial MNGR</a></li>
>>>>>>> 927869fcbfbb870e6198d47214c9b149407bb85a
		</ul>
	</nav>
</aside>