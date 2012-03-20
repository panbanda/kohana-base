<?php defined('SYSPATH') OR die('No direct access allowed.');

class Input {

	/**
	 * Returns a value from the $_POST array
	 */
	public static function post($key = NULL, $default = NULL)
	{
		// If there are no post variables
		if (empty($_POST) && $key === NULL) return FALSE;

		// If the key is not specified
		if (is_null($key)) return $_POST;

		// Lets load provided variables
		if (is_array($key)) return Arr::extract($_POST, $key);

		// Perform default
		return Arr::get($_POST, $key, $default);
	}

	/**
	 * Returns a value from the $_GET array
	 *
	 * @param  $key  Mixed (NULL, String, Array)
	 * @param  $default  Default value for individual key
	 */
	public static function get($key = NULL, $default = NULL)
	{
		// If there are no post variables
		if (empty($_GET) && $key === NULL) return FALSE;

		// If the key is not specified
		if (is_null($key)) return $_GET;

		// Lets load provided variables
		if (is_array($key)) return Arr::extract($_GET, $key);

		// Perform default
		return Arr::get($_GET, $key, $default);
	}
}
