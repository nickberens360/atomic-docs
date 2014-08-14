// <?php
// $doc = new DOMDocument();
// $doc->loadHTMLFile("strip.php");
// $style = $doc->getElementsByTagName('style');

// foreach ($style as $style) {
//     echo $style->nodeValue, PHP_EOL;
// }

// ?>



<?php

$fileName = "file-name"

$ourFileName = "scss/testFile.scss";
$ourFileHandle = fopen($ourFileName, 'w') or die("can't open file");
fclose($ourFileHandle);
?>