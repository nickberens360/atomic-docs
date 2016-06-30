
<li class="aa_dir <?php if ($current_page == "modules.php"){ echo "active "; }?>">
		<div class="aa_dir__dirNameGroup">
			<i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="aa_dir__dirNameGroup__name" href="atomic-core/modules.php">modules</a>
		</div>
		<ul class="aa_fileSection">
      <li class="aa_addFileItem">
        <a class="aa_addFile aa_js-actionOpen aa_actionBtn" href="atomic-core/categories/modules/form-modules.php"><span class="fa fa-plus"></span> Add Component</a>
      </li>
			<?php
				$orig = "../components/modules";
				if ($dir = opendir($orig)) {
					while ($file = readdir($dir)) {
						$filename = basename($file, '.php');
						if ($file != '.' && $file != '..') {
							echo "<li class='aa_fileSection__file'><a class='aa_js-actionOpen aa_actionBtn fa fa-pencil-square-o' href='atomic-core/categories/modules/form-$filename.php'></a><a href='atomic-core/modules.php#$filename'>$filename</a></li>";
						}
					}
					closedir($dir);
				}
			?>
		</ul>
</li>
