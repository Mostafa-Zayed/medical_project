<?php

// Array Of Errors
$errors = array();

// Constant Of MaxEmaillength
defined('MAXEMAILLENGTH') || define('MAXEMAILLENGTH',100);

// Constant Of MaxPasswordLength
defined('MAXPASSWORDLENGTH') || define('MAXPASSWORDLENGTH',255);

// Constant Of MaxCityNameLength
defined('MAXCITYNAMELENGTH') || define('MAXCITYNAMELENGTH',100);

/**
* This Function To Check if The Value Email Or Not
*
* @param String $vlaue
* @return bool 
*/
function is_email(string $value): bool 
{
	return filter_var($value,FILTER_VALIDATE_EMAIL);
}

/**
* This Function To Check if The Value is String
* 
* @param mixed $vlaue
* @return bool
*/
function is_string_modified($value): bool
{
	return is_string($value);
}

/**
* This Function To Check if The Value Required and Not empty
*
* @param mixed $value
* @return bool
*/
function is_required($value): bool
{
	return !empty($value);
}

/**
 * This Function To Check if The Value Less Than MaxLength
 * 
 * @param string $value
 * @return bool
 */
function is_not_more_than(string $value, int $maxlength): bool
{
	return strlen($value) <= $maxlength;
}

/**
 * This Function Check if The Value Integer Or Not 
 * 
 * @param int $value
 * @return boll
 */
function is_integer_modified($value)
{
	return is_int($value);
}
/**
 * This Function Get Error By Key
 * 
 * @param string $key
 * @return string 
 */
function getError(string $key) 
{
	global $errors;
	return isset($errors[$key]) ? '<span class="alert-danger"> ( '.$errors[$key].' ) </span>' : false;
}

