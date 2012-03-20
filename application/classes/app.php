<?php defined('SYSPATH') OR die('No direct access allowed.');

class App {

	public static function format_time($timestamp)
	{
		return date('m/d/Y', $timestamp);
	}

	public static function format_amount($number)
	{
		return '$'.number_format($number, 2);
	}

	public static function fuzzy_date($timestamp)
	{
		$myDays = array("Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat");

		if(preg_match("/[-\/:]/", $timestamp)) $timestamp = strtotime($timestamp);

		if ($timestamp > time())
			// All future dates
			return date('m/d/y', $timestamp);
		elseif ($timestamp >= mktime(0,0,0))
			// Today
			return 'Today';
		elseif ($timestamp >= mktime(0,0,0) - 86400)
			// Yesterday
			return 'Yesterday';
		elseif ($timestamp >= mktime(0,0,0) - 86400*7)
			// Within 7 days
			return $myDays[date('w', $timestamp)];
		elseif ($timestamp >= mktime(0,0,0,1,1))
			// Within 1 year
			return date('M d', $timestamp);

		return App::format_time($timestamp);
	}
}

