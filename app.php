<?php

// Include Globals File 
require_once 'globals.php';

// Include Env File 
require_once "env.php";

// Include Core Files
$files = glob(CORE.'*.php');

foreach ($files as $file) {
    require_once $file;
}
?>