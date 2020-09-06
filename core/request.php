<?php

/**
* This Function To Redirect To The given Path
*
* @param string $path
* @return void
*/
function redirect(string $path) : void 
{
	header('location:'.$path);
}

?>