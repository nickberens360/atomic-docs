<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(1);

require_once('required.php');

$viewCategory = Atomic::getValue('v');

include("head.php");
?>
	<body class="atoms">


<div class="grid-row atoms-container">
	<?php include("sidebar.php"); ?>

	<div class="atoms-main">
		<h1 class="atomic-h1"><span contenteditable="true"><?= ucwords($viewCategory); ?></span></h1>
		<?php
		if( $viewCategory ) {
			Atomic::give('viewCategory', $viewCategory);
			Atomic::render('category');
		}
		?>
	</div>

</div>
<div class="aa_js-actionDrawer aa_actionDrawer">
	<div class="aa_actionDrawer__wrap">
		<div class="aa_js-actionClose aa_actionDrawer__close"><i class="fa fa-times fa-3x"></i></div>
		<div id="js_actionDrawer__content" class="actionDrawer__content"></div>
	</div>
</div>
<?php include("footer.php"); ?>