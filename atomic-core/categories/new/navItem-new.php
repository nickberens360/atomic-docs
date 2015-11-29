
<li class="ad_dir <?php if ($current_page == "new.php"){ echo "active "; }?>">
		<div class="ad_dir__dirNameGroup">
			<i class="ad_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="ad_dir__dirNameGroup__name" href="atomic-core/new.php">new</a>
		</div>
		<ul class="ad_fileSection">
      <li class="ad_addFileItem">
        <a class="ad_addFile ad_js-actionOpen ad_actionBtn" href="/atomic-core/categories/new/form-new.php"><span class="fa fa-plus"></span> Add Component</a>
      </li>
			<?php
				$orig = "../components/new";
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
				echo "<li class='ad_fileSection__file'><a class='ad_js-actionOpen ad_actionBtn fa fa-pencil-square-o' href='atomic-core/categories/new/_ajaxComp-$filename.php'></a><a href='#$filename'>$filename</a></li>";
				}
				}
				closedir($dir);
				}
			?>
		</ul>
</li>
