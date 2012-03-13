<?php defined('SYSPATH') OR die('No direct access allowed.');

class Message {
	
	public static function success($message = NULL)
	{
		self::set('success', $message);
	}

	public static function error($message = NULL)
	{
		self::set('error', $message);
	}

	public static function warn($message = NULL)
	{
		self::set('warn', $message);
	}
	
	public static function set($key, $message = NULL)
	{
		Session::instance()->set('message', array($key, (array) $message));
	}
	
	public static function clear()
	{
		Session::instance()->delete('message');
	}
	
	public static function render()
	{
		$data = Session::instance()->get_once('message');
		
		if ($data === NULL OR ! is_array($data)) return NULL;
		
		list($class, $message) = $data;
		
		return View::factory('message/output')
			->set('class', $class)
			->set('messages', $message);
	}
} 

