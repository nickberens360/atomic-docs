<?php //require_once('modules/navItem-modules.php'); ?>
<?php //include('atoms/navItem-atoms.php'); ?>
<?php
global $Atomic;
global $current_page;
$orig = $Atomic->config['componentDirectory'];
/*
function openDirectory($directory, $category) {
	if ($dir = opendir($directory)) {
		while ($file = readdir($dir)) {
			$ok = true;
			$filename = $file;
			$filename = basename($filename, ".php");
			if ($file == ".") {
				$ok = false;
			}
			else if ($file == "..") {
				$ok = false;
			}
			if ($ok) {
				$filename = str_replace(".php", "", $filename);
				?>
				<li class="aa_fileSection__file">
					<a class="js-show-form" href="javascript: void(0)" data-category="<?= $category; ?>" data-form="component-edit" data-component="<?= $filename; ?>">
						<span class="fa fa-pencil-square-o"></span>
					</a>
					<a href="atomic-core/<?= $category; ?>#<?= $filename; ?>"><?= $filename; ?></a>
				</li>
				<?php
			}
		}
		closedir($dir);
	}
}
function directoryIterator($dir) {
	global $current_page;
	foreach ($dir as $fileinfo) {
		if ($fileinfo->isDir() && !$fileinfo->isDot()) {
			?>
			<li class="aa_dir <?php if ($current_page == $fileinfo->getFilename()) {
				echo "active ";
			} ?>">
				<div class="aa_dir__dirNameGroup">
					<i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
					<a class="aa_dir__dirNameGroup__name"
					   href="atomic-core/<?= $fileinfo->getFilename(); ?>"><?= $fileinfo->getFilename(); ?></a>
				</div>
				<ul class="aa_fileSection">
					<?php
					openDirectory($fileinfo->getPathName(), $fileinfo->getFilename());
					?>
					<li class="aa_addFileItem">
						<a class="aa_addFile aa_js-actionOpen aa_actionBtn js-show-form"
						   href="javascript: void(0);" data-form="component-new" data-category="<?= $fileinfo->getFilename(); ?>">
							<span class="fa fa-plus"></span> Add Component</a>
					</li>
				</ul>
			</li>
			<?php
		}
	}
}
$dir = new DirectoryIterator($Atomic->config['componentDirectory']);
directoryIterator($dir);
*/

require_once(dirname(__FILE__) . '/../../lib/FllatCategory/FllatCategory.php');
require_once(dirname(__FILE__) . '/../../lib/FllatComponent/FllatComponent.php');
$FllatCategory = new FllatCategory();
$FllatComponent = new FllatComponent();

$categories = $FllatCategory->select();

foreach ($categories as $category) {
	?>
	<li class="aa_dir <?php if ($current_page == $category['category']) {
		echo "active ";
	} ?>">
		<div class="aa_dir__dirNameGroup">
			<i class="aa_dir__dirNameGroup__icon  fa fa-folder-o"></i>
			<a class="aa_dir__dirNameGroup__name"
			   href="atomic-core/<?= $category['category']; ?>"><?= $category['category']; ?></a>
		</div>
		<ul class="aa_fileSection">
			<?php
			$components = $FllatComponent->where('category', $category['category']);

			foreach ($components as $component) {
				?>
				<li class="aa_fileSection__file">
					<a class="js-show-form" href="javascript: void(0)" data-category="<?= $category['category']; ?>"
					   data-form="component-edit" data-component="<?= $component['component']; ?>">
						<span class="fa fa-pencil-square-o"></span>
					</a>
					<a href="atomic-core/<?= $category['category']; ?>#<?= $component['component']; ?>"><?= $component['component']; ?></a>
				</li>
				<?php
			}
			?>
			<li class="aa_addFileItem">
				<a class="aa_addFile aa_js-actionOpen aa_actionBtn js-show-form"
				   href="javascript: void(0);" data-form="component-new"
				   data-category="<?= $category['category']; ?>">
					<span class="fa fa-plus"></span> Add Component</a>
			</li>
		</ul>
	</li>
	<?php
}