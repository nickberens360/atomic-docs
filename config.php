<?php
function getConfig() {
  $config = array();
  $config['dir'] = dirname(__FILE__);
  $config['cssDir'] = 'scss';
  $config['cssExt'] = 'scss';
  
  $config['compExt'] = 'php';
  
  return $config;
}