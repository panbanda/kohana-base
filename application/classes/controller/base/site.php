<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Base_Site extends Controller_Template {
	
	// Variables that effect the view
	protected $scripts;
	protected $stylesheets;

	public $template = 'layouts/default';
	public $session;
	public $user;

	public function __construct(Request $request)
	{
		if (Request::$is_ajax)
		{
			$this->profiler = NULL;
			$this->auto_render = FALSE;
		}
		
		$this->session = Session::instance();
		parent::__construct($request);
	}

	public function before()
	{
		parent::before();
		
		// Init variables
		$this->session = Session::instance();
		
		// Get the view and set it in the controller
		$view_name = $this->request->controller . '/' . $this->request->action;
		$view_name = str_replace('_', '/', $view_name);
		
		// Attach directory of route
		if ( isset($this->request->directory)) 
		{
			$view_name = $this->request->directory . '/' . $view_name;
		}
		
		$view_name = strtolower($view_name);
		
		// Attach the view if it exists
		$this->view = (bool) Kohana::find_file('views', $view_name) ? new View($view_name) : NULL;
		
		// Set the default data in the template
		if ($this->auto_render) 
		{
			$this->scripts = Kohana::config('app.scripts');
			$this->stylesheets = Kohana::config('app.stylesheets');
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
				->set('styles', (array) $this->_styles)
				->set('content', $this->view);
		}
		
		// Destroy the database connections
		foreach (Database::$instances as &$conn) unset($conn);
		
		parent::after();
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
		$this->stylesheets = Arr::merge($this->_styles, (array) $urls);
	}

}
