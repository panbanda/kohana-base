<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base_Site extends Controller_Template {
	
	// Variables that effect the view
	protected $_scripts;
	protected $_stylesheets;
	
	public $template = 'layouts/default';
	public $session;

	public function before()
	{
		parent::before();
		
		// Init variables
		$this->session = Session::instance();
		
		$request = $this->request;
		
		// Get the view and set it in the controller
		$view_name = $request->controller() . '/' . $request->action();
		$view_name = str_replace('_', '/', $view_name);
		
		// Attach directory of route
		if ($request->directory() !== NULL) 
		{
			$view_name = $request->directory() . '/' . $view_name;
		}
		
		$view_name = strtolower($view_name);
		
		// Attach the view if it exists
		$this->view = (bool) Kohana::find_file('views', $view_name) ? new View($view_name) : NULL;
		
		// Set the default data in the template
		if ($this->auto_render)
		{
			$config = Kohana::$config->load('app');
			
			$this->_scripts = $config->scripts;
			$this->_stylesheets = $config->stylesheets;
		}
	}

	public function after() 
	{		
		// Append required includes to the array 
		if ($this->auto_render) 
		{
			// Update template variables
			$this->template
				->set('scripts', (array) $this->_scripts)
				->set('stylesheets', (array) $this->_stylesheets)
				->set('content', $this->view);
		}
		
		parent::after();
		
		// Destroy the database connections
		foreach (Database::$instances as &$conn) unset($conn);
	}
	
	/**
	 * Add scripts
	 *
	 * @param  $urls  Mixed array or string
	 */
	protected function add_script($urls)
	{
		$this->scripts = Arr::merge($this->_scripts, (array) $urls);
	}
	
	/**
	 * Add stylesheets
	 *
	 * @param  $urls  Mixed array or string
	 */
	protected function add_stylesheet($urls)
	{
		$this->stylesheets = Arr::merge($this->_stylessheets, (array) $urls);
	}

}
