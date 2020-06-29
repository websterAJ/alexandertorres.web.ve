<?php
class errorController
{
	// Nuestra vista de errores
	public static function Show($tipo, $obj = NULL)
	{
		$title = 'Error Detectado';
		$error = 'Ocurrio un error inesperado';

		switch($tipo)
		{
			case 1:
				$title = 'No existe el controlador';
				$error = 'El controlador <b>' . $obj->Controller . '</b> que intenta cargar no se encuentra en la carpeta <b>Controller</b>.';
				break;
			case 2:
				$title = 'No se pudo cargar la Acción';
				$error = 'La acción <b>' . $obj->Action . '</b> que intenta ejecutar no existe en nuestro controlador <b>' . $obj->Controller . '</b>.';
				break;
			case 3:
				$title = 'No se pudo cargar la Vista';
				$error = 'El archivo <b>' . $obj->GetCurrentView() . '</b> que intenta cargar no se encuentra en la carpeta View.';
				break;
			case 4:
				$title = 'La base de datos detecto un error';
				$error = $obj->getMessage();
				break;
			case 5:
				$title = 'No se pudo cargar el Modelo';
				$error = 'El modelo <b>' . $obj->GetLastModelLoaded() . '</b> a cargar no existe';
				break;
			case 6:
				$title = 'No se pudo cargar el Helper';
				$error = 'El helper <b>' . $obj->GetLastHelperLoaded() . '</b> a cargar no existe';
				break;
		}

		// Cargamos la vista del Error
		require_once 'views/error.php';
		exit();
	}
}