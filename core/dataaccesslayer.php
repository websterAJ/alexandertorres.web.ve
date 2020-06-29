<?php
class dataaccesslayer
{
	/**
	 * instancia que almacena los datos de conexion a la base datos
	 * @var $Link 
	 */
	protected $Link;

	public function __CONSTRUCT()
	{
		// Recuperamos nuestra cadena de conexión
		$ConnectionString = explode('|', _DB_CONNECTION_STRING_);

		try {
			// Instanciamos PDO
			$this->Link = new PDO($ConnectionString[0], $ConnectionString[1], $ConnectionString[2]);

			// Le indicamos que nos muestre los errores
			$this->Link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			// Si hay un error llamamos al ErrorController
			ErrorController::Show(4, $e);
		}

		return $this;
	}

	/**
	 * Metodo SelectAll
	 *
	 * Metodo encargado de realizar una consulta general a una tabla de la base de datos
	 * especificando la tabla a consultar al igual que las columnas a retornar 
	 *
	 * Parametros que recibe el metodo
	 *
	 *	$attr   String
	 *	$table  String
	 *  Return array
	 */
	public function SelectAll($attr,$table)
	{
		$data = null;
		
		try 
		{
			$db = $this->Link->prepare("SELECT $attr FROM $table ;");    
			$db->execute();
			$data = $db->fetchAll(PDO::FETCH_ASSOC);
		} catch (Exception $e) {
			BaseHelper::ELog($e);
			return 2;
		}

		return $data;
	}

	/**
	 * Metodo SelectWhere
	 *
	 * Metodo encargado de realizar una consulta mas especifica a una tabla 
	 * de la base de datos
	 *
	 * Especificando la tabla a consultar al igual que las columnas a retornar 
	 * segun cumpla una condicion especificada
	 *
	 *
	 * Parametros que recibe el metodo
	 *
	 *	$attr   String
	 *	$table  String
	 *	$where  String
	 *  Return array
	 */
	public function SelectWhere($attr,$table,$where)
	{
		$data = null;
		
		try 
		{
			$db = $this->Link->prepare("SELECT $attr FROM $table WHERE $where;");    
			$db->execute();
			$data = $db->fetchAll(PDO::FETCH_ASSOC);
			if($data > 0){
	           return $data;
        	}

		} catch (Exception $e) {
			BaseHelper::ELog($e);
			return 2;
		}

		
	}

	/**
	 * Metodo Delete
	 *
	 * Metodo encargado de eliminar datos en la tablas de la base de datos
	 *
	 *
	 * Parametros que recibe el metodo
	 *
	 *	$where   String
	 *	$table  String
	 *  Return void
	 */
	public function Delete($where,$table)
	{
		try 
		{

			$db = $this->Link->prepare("DELETE FROM $table WHERE $where;");    
			$db->execute();
			return TRUE;
		} catch (Exception $e) {
			BaseHelper::ELog($e);
			return FALSE;
		}
	}

	/**
	 * Metodo Update
	 *
	 * Metodo encargado de actualizar datos en la tablas de la base de datos
	 *
	 *
	 * Parametros que recibe el metodo
	 *
	 *	$table   String
	 *	$columnas  String
	 *	$where  String
	 *  Return void
	 */
	public function Update($table,$columnas,$where)
	{
		$valores ="";
		
        try 
		{

	        foreach ($columnas as $key => $value) {

	          $valores .="`$key`='".$value."',";

	        }      	
        	$valores = substr($valores,0,strlen($valores)-1);
			$db = $this->Link->prepare("UPDATE `$table` SET $valores WHERE $where;");    
			$db->execute();
			return TRUE;
		} catch (Exception $e) {
			BaseHelper::ELog($e);
			return FALSE;
		}
	}

	/**
	 * Metodo Insert
	 *
	 * Metodo encargado de insertar datos en tablas especificada y en las columnas
	 * indicadas
	 *
	 * Parametros que recibe el metodo
	 *
	 *	$table   String
	 *	$columns  String
	 *	$where  String
	 *  Return void
	 */
	public function Insert($table,$columns)
	{
		$columnas=null;
      	$datos=null;
        try 
		{
			foreach ($columns as $key => $value) {
		        $columnas.=$key.",";
		        $datos.='"'.$value.'",';
      		}
        	$columnas = substr($columnas, 0, -1);
			$datos = substr($datos, 0, -1);
			$db = $this->Link->prepare("INSERT INTO $table ($columnas) VALUES ($datos)");    
			$db->execute();
			return TRUE;

		} catch (Exception $e) {
			BaseHelper::ELog($e);
			return FALSE;
		}
	}

	public function __DESTRUCT()
	{
		$this->Link = NULL;
	}

}