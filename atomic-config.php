<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);

  //user defined varibales
  $config['preCssDir'] = 'scss'; //Scss preprocessor directory name. E.G sass
  $config['preCssExt'] = 'scss'; //prerocessed file ext. E.G. scss
  $config['compExt'] = 'html'; //markup file ext. E.G. .html
  
  return $config;
}