<?php

require "../fllat.php";

$catdb = new Fllat("categories", "../../atomic-db");

$compdb = new Fllat("components", "../../atomic-db");


$settingsdb = new Fllat("settings", "../../atomic-db");



$config = getConfig('../..');
$stylesDir = $config[0]['styles_directory'];
$compDir = $config[0]['component_directory'];


global $compdb;
global $catdb;

