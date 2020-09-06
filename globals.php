<?php

// DIRECTORY SEPARATOR
defined('DS') || define('DS',DIRECTORY_SEPARATOR);

// ROOT PATH
defined('ROOT') || define('ROOT',__DIR__.DS);

// AUTH PATH
defined('AUTH') || define('AUTH',ROOT.'auth'.DS);

// ASSETS PATH
defined('ASSETS') || define('ASSETS',ROOT.'assets'.DS);

// INC PATH
defined('INC') || define('INC',ROOT.'inc'.DS);

// CORE PATH
defined('CORE') || define('CORE',ROOT.'core'.DS);

// ADMIN PATH
defined('ADMIN') || define('ADMIN',ROOT.'admin'.DS);

// WEBSITE URL LINK
defined('WEBSITE_URL') || define('WEBSITE_URL','http://'.$_SERVER['HTTP_HOST'].DS.'medical'.DS);

// ADMIDN URL LINK
defined('ADMIN_URL') || define('ADMIN_URL','http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).ADMIN.DS);

// SITE_TITLE
defined('SITE_TITLE') || define('SITE_TITLE','Medical System');

?>