<?php
$comp = $_GET["component"];
$cat = $_GET["category"];
require "fllat.php";
$settings = new Fllat( "settings", "../atomic-db" );
$settings = $settings->select( array() );
$compExt = $settings[0]['component_extension'];
$compDir = $settings[0]['component_directory'];
?>
<!Doctype html>
<head lang="en">
	<meta charset="UTF-8">
	<title><?php echo $_GET["comp-name"]; ?></title>
	<base href="../">
	
	
	<?php
	$filename = '../atomic-head.php';
	if ( file_exists( $filename ) ) {
		include( "../atomic-head.php" );
	}
	?>


	<style>
		html, body {
			height: 100%;
		}

		body {
			margin: 0;
			padding: 0;
		}
	</style>
</head>
<!--Add conditional if component not found-->
<body>
<div id="partial" class="partial" onload="javascript: getHeight(this);">
	<?php require( '../' . $compDir . '/' . $cat . '/' . $comp . '.' . $compExt . '' ); ?>
</div>

<?php
$filename = '../atomic-head.php';
if ( file_exists( $filename ) ) {
	include( "../atomic-foot.php" );
}
?>
<pre>
	        <?php
	        print_r( $_SERVER );
	        ?>
        </pre>
<script>
	var e = document.getElementById('partial');
	parent.postMessage({
		element: 'component-<?= $comp; ?>',
		elementHeight: e.clientHeight
	}, '<?= ( $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['SERVER_NAME'] ); ?>');
</script>
</body>
