<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);

  //CHANGE THESE AT YOUR OWN RISK. NOT TESTED TERRIBLY WELL.
  //user defined varibales
  $config['preCssDir'] = 'less'; //Scss preprocessor directory name. E.G sass
  $config['preCssExt'] = 'less'; //prerocessed file ext. E.G. scss
  $config['compExt'] = 'php'; //markup file ext. E.G. html, twig, etc...

  return $config;
}