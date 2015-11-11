<li class="ad_dir <?php if ($current_page == "test.php"){ echo "active "; }?>">
		<div class="ad_dir__dirNameGroup">
			<i class="ad_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="ad_dir__dirNameGroup__name" href="atomic-core/test.php">test</a>
      <a class="ad_addFile ad_js-actionOpen ad_actionBtn" href="atomic-core/actions/test/_ajax-test.php"><span class="fa fa-plus"></span> Add File</a>
		</div>
		<ul class="ad_fileSection">
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
				echo "<li><a href='#$filename'>$filename</a><a class='ad_js-actionOpen ad_actionBtn' href='atomic-core/actions/test/_ajaxComp-$filename.php'>edit</a></li>";
				}
				}
				closedir($dir);
				}
			?>
		</ul>
</li>