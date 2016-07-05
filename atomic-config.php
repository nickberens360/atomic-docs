<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);


  //user defined varibales
  $config['preCssDir'] = 'scss'; //Scss preprocessor directory name. E.G sass, less
  $config['preCssExt'] = 'scss'; //prerocessed file ext. E.G. scss, sass, less
  $config['compExt'] = 'php'; //markup file ext. E.G. html, twig, etc...
  $config['dbPath'] = 'db'; //path of the db folder (relative to atomic-core)

  $config['dbPath'] = 'db';

  return $config;
}
