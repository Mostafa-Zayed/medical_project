<?php

/**
* This Function To Remove spaces in first and end of text and incode html tages
* 
* @param string $input
* @return string
*/
function prepare_input(string $input): string
{
	return trim(htmlspecialchars($input));
}

/**
* This Function To Redirect To The given Path
*
* @param string $path
* @return void
*/
function redirect(string $path): void 
{
	header('location:'.WEBSITE_URL.$path);
}

?>