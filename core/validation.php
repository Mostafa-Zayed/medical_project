<?php

/**
* This Function To Remove spaces in first and end of text and incode html tages
* 
* @param string $input
* @return string
*/
function prepare_input(string $input) : string
{
	return trim(htmlspecialchars($input));
}

/**
* This Function To Check if The Value Email Or Not
*
* @param String $vlaue
* @return bool 
*/
function is_email(string $value) : bool 
{
	return filter_var($value,FILTER_VALIDATE_EMAIL);
}

/**
* This Function To Check if The Value is String
* 
* @param mixed $vlaue
* @return bool
*/
function value_string($value) : bool
{
	return is_string($value);
}

/**
* This Function To Check if The Value Required and Not empty
*
* @param mixed $value
* @return bool
*/
function is_required($value) : bool
{
	return isset($value) && !empty($value);
}

