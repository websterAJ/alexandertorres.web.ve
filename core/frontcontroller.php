<?php
class frontcontroller
{
	public $Uri = array();
	public $Area;
	public $Controller;
	public $Action = 'index';

	// Constructor
	public function __CONSTRUCT($reload=false)
	{
		//	0 => 'Raíz del Proyecto' 1=> 'index.php' 1 => 'Controlador'	3 => 'Accion' 4 => 'Parametros Adicionales'
		$this->Uri = explode('/', substr($_SERVER['REQUEST_URI'], 1, strlen($_SERVER['REQUEST_URI']) -1));
		
		// Preguntamos si existe en la URL actual una llamada a algun controlador especifico
		if(count($this->Uri) == 2 || count($this->Uri) < 2)
		{
			$this->Controller = _DEFAULT_CONTROLLER_;
		}
		elseif(count($this->Uri) > 2)
		{
			
			// Si en la URL por defecto no hay referencia de un controlador, cargamos el que esta por defecto
			if($this->Uri[1] == '' || $this->Uri[1] == 'index.php')
			{
				$this->Controller = _DEFAULT_CONTROLLER_;
			}
			else
			{			
				// Verificamos si es un Area
				if(is_dir( _BASE_FOLDER_ . 'controllers/' . $this->Uri[1] ))
				{
					$this->Area = $this->Uri[2];
					$this->Controller = str_replace('/', '', $this->Uri[3]);
				}
				else
				{
					$this->Controller = str_replace('/', '', $this->Uri[1]);
				}
			}

			// Si se ha especificado la acción
			$i = $this->Area == null ? 2 : 3;
			if(isset($this->Uri[$i]))
			{
				if($this->Uri[$i] != '' && $this->Uri[$i] != '/')
					$this->Action = str_replace('/', '', $this->Uri[$i]);
			}
		}

		if(!$reload)
		{
			// Guardamos la ruta del controlador
			$_Controller = 'controllers/' . ($this->Area == null ? '' : $this->Area . '/') . $this->Controller . '.php';


			// Verificamos que la vista exista
			if (! file_exists ( $_Controller )){
				ErrorController::Show(1, $this);
			}

			// Cargamos el fichero
			require_once $_Controller;

			$ControladorActual = $this->Controller;
			$AccionActual      = $this->Action;

		
			// Creamos una instancia del controlador actual y ejecutamos su accion
			$c = new $ControladorActual();


			// Verificamos si la acción existe
			if(!method_exists($c, $this->Action)){
				ErrorController::Show(2, $this);
			}

			// Ejecutamos la acción actual
			$c->$AccionActual();
		}
	}
}