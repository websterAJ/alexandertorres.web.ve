<?php  
require_once 'helper/jqgridhelper.php';
/**
* Model de usuario encargado de realizar todas las consultas a la base de datos
*/
class dashboardmodel extends dataaccesslayer{
	private $jq;
	private $rh;

	function __construct()
	{
		parent::__CONSTRUCT();
		$this->jq = new jqgridhelper();
		$this->rh = new responsehelper();
	}
	/**
	 * Funcion encargada de realizar una consulta a la base de datos
	 *  
	 * @param  [Varchar] $columns columnas a devolver 
	 * @param  [Varchar] $table   tabla a ser consultada
	 * @return [Array] datos de la consulta realizada
	 */
	public function getData($columns, $table)
	{
		return $this->SelectAll($columns,$table);
	}
	/**
	 * Funcion encargada de realizar una consulta a la base de datos
	 *  
	 * @param  [Varchar] $columns columnas a devolver 
	 * @param  [Varchar] $table   tabla a ser consultada
	 * @param  [Varchar] $where   condicion que debe cumplir los datos a ser devueltos
	 * @return [Array] datos de la consulta realizada
	 */
	public function getDataWhere($columns, $table, $where)
	{
		return $this->SelectWhere($columns,$table,$where);
	}
	/**
	 * Funcion encargada de eliminar  datos dentro de la base de datos
	 * @param  [Varchar] $where condicion que debe ser cumplida para eliminar los datos
	 * @param  [Varchar] $table   tabla donde los datos va hacer eliminados
	 * @return [type]          [description]
	 */
	public function deleteData($table, $where)
	{
		return $this->Delete($where,$table);
	}
	/**
	 * Funcion encargada de actualizar datos dentro de la base de datos
	 * @param  [Array] $columns datos y columnas donde van hacer modificados
	 * @param  [Varchar] $table   tabla donde los datos va hacer alterados o cambiados
	 * @return [type]          [description]
	 */
	public function updateData($columns, $table, $where)
	{
		return $this->Update($table,$columns,$where);
	}
	/**
	 * Funcion encargada de insertar datos dentro de la base de datos
	 * @param  [Array] $columns  datos y columnas donde van hacer insertados los datos
	 * @param  [Varchar] $table   tabla donde los datos va hacer almacenados
	 * @return [type]          [description]
	 */
	public function insertData($columns, $table)
	{
		return $this->Insert($table,$columns);
	}
}
?>