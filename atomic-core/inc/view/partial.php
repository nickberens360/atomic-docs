<?php

require_once('required.php');

$viewCategory = Atomic::getValue('v');
?>
<!Doctype html>
<head lang="en">
	<meta charset="UTF-8">
	<title><?= Atomic::getValue('component'); ?></title>
    <link rel="stylesheet" type="text/css" href="../../../src/css/main.css">



<!--	<style type="text/css">
		body, html {
			overflow: hidden
		}

		#partial {
			padding: 1px 0
		}
	</style>-->
	<!-- Insert your CSS resources here. -->
</head>


<?php
if (Atomic::getValue('component') && Atomic::getValue('category')) {
?>
<body>


<div class="partial">
	<?php
	require_once(Atomic::includePath() . '/inc/lib/Component.php');
	$Component = new Component();
	$Component->show(Atomic::getValue('component'), Atomic::getValue('category'));
	?>
</div>
<?php
}
else {
	?>
	<strong>Partial not found</strong>
	<?php
}
?>


</body>
</html>
