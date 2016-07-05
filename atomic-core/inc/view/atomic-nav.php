<?php //require_once('modules/navItem-modules.php'); ?>
<?php //include('atoms/navItem-atoms.php'); ?>
<?php

global $Atomic;
global $current_page;
$orig = $Atomic->config['componentDirectory'];


require_once(Atomic::includePath() .'/inc/lib/FllatCategory/FllatCategory.php');
require_once(Atomic::includePath() .'/inc/lib/FllatComponent/FllatComponent.php');

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
			   href="atomic-core/?v=<?= $category['category']; ?>"><?= $category['category']; ?></a>
		</div>

		<ul class="aa_fileSection">
			<li class="aa_addFileItem">
				<a class="aa_addFile aa_js-actionOpen aa_actionBtn js-show-form"
				   href="javascript: void(0);" data-form="component-new"
				   data-category="<?= $category['category']; ?>">
					<span class="fa fa-plus"></span> Add Component</a>
			</li>

			<?php
			$components = $FllatComponent->where('category', $category['category']);

			foreach ($components as $component) {
				?>
				<li class="aa_fileSection__file">
					<a class="js-show-form" href="javascript: void(0)" data-category="<?= $category['category']; ?>"
					   data-form="component-edit" data-component="<?= $component['component']; ?>">
						<span class="fa fa-pencil-square-o"></span>
					</a>
					<a href="atomic-core/?v=<?= $category['category']; ?>#<?= $component['component']; ?>"><?= $component['component']; ?></a>
				</li>
				<?php
			}
			?>

		</ul>
	</li>
	<?php
}