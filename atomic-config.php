<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);

  //CHANGE THESE AT YOUR OWN RISK. NOT TESTED TERRIBLY WELL.
  //user defined varibales
  $config['preCssDir'] = 'scss'; //Scss preprocessor directory name. E.G sass
  $config['preCssExt'] = 'scss'; //prerocessed file ext. E.G. scss
  $config['compExt'] = 'php'; //markup file ext. E.G. html, twig, etc...

  return $config;
}