<?php
$url=strtok($_SERVER["REQUEST_URI"],'?');
if (preg_match('/\.(?:png|jpg|jpeg|gif|css|ttf|woff|woff2)$/', $url)) {
    return false;
}
elseif (file_exists(__DIR__ . '/../' . $url)) {
   return false; // serve the requested resource as-is.
}
else {
    include_once 'atomic-core/index.php';
}
