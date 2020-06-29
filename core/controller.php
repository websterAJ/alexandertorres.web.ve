<?php
class controller extends frontcontroller
{
	protected $Layout = true;
	private $View = ''; // Solo de Lectura

	private $Model = ''; // Solo de Lectura
	protected $Models = array();

	public $Attach;

	// Constructor
	public function __CONSTRUCT()
	{
		parent::__CONSTRUCT(true);
	}

	// Obtenemos la Uri actual
	protected function GetCurrentUri()
	{
		return $this->Uri;
	}

	// Obtenemos el controlador actual
	protected function GetCurrentController()
	{
		return $this->Controller;
	}

	// Obtenemos la accion actual
	protected function GetCurrentAction()
	{
		return $this->Action;
	}

	// Obtenemos la vista actual
	public function GetCurrentView()
	{
		return $this->View;
	}

	// Nos mapea una ruta partiendo de la raiz del proyecto
	public function BaseUrl($url)
	{
		return _BASE_URL_ . $url;
	}

	public function BaseFolder($folder)
	{
		return _BASE_FOLDER_. $folder;
	}

	// Cargamos la vista
	protected function LoadView($view='')
	{
		// Cargamos la vista
		if($view == '') $this->View = 'views/' . ($this->Area == null ? '' :  $this->Area . '/') . $this->Controller . '/' . strtolower($this->Action) . '.php';
		else $this->View = 'views/' . ($this->Area == null ? '' : $this->Area . '/') . $view . '.php';

		// Verificamos que la vista exista
		if (! file_exists ( $this->View )) {
			ErrorController::Show(3, $this);
		}

		if($this->Layout):
			require_once 'views/' . ($this->Area == null ? '' : $this->Area . '/') . 'layout.php'; // Incluimos el layout
		else: 
			require_once $this->View;
		endif; // Incluimos solo la vista
	}

	// Cargamos el modelo
	protected function LoadModel($model)
	{
		$this->Model = 'models/' . strtolower($model) . '.php';
		
		
		// Verificamos que exista
		if (!file_exists ( $this->Model )) {
			ErrorController::Show(5, $this);
		}
		
		// Guardamos en nuestra variable Models todo los modelos que vamos cargando
		$this->Models[] = $model;

		// Cargamos el modelo
		require_once $this->Model;
		return new $model();
	}

	// El ultimo Modelo que cargamos
	public function GetLastModelLoaded()
	{
		return $this->Model;
	}
}