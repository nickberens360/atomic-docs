<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);

  //user defined varibales
  $config['cssDir'] = 'scss'; //CSS proprocessed dir name
  $config['cssExt'] = 'scss'; //prerocessed file ext. E.G. scss
  $config['compExt'] = 'html'; //markup file ext. E.G. .html
  
  return $config;
}