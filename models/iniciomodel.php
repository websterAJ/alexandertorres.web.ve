<?php
require_once 'helper/jqgridhelper.php';

class iniciomodel extends dataaccesslayer{

    private $jq;
	private $rh;
	function __construct()
	{
		parent::__CONSTRUCT();
		$this->jq = new jqgridhelper();
		$this->rh = new responsehelper();
	}

	public function UserLogin($attr,$where)
	{
		return $this->SelectWhere($attr,'usuario, persona',$where);
	}
	public function UserActive($colunms)
	{
		$datos=null;

		$datos=array('accion' => "el usuario ".$colunms['user']." a iniciado session el dia ".$colunms['Ultimo_inicio'],'type_his' => $colunms['type_his']);
		return $this->Insert('historico',$datos);
    }
    public function GetDataAll($attr,$table)
    {
        return $this->SelectAll($attr,$table);
    }

    public function GetDataWhere($attr,$table,$where)
    {
        return $this->SelectWhere($attr,$table,$where);
    }

    public function InsertData($datos,$table)
    {
        return $this->Insert($table,$datos);
    }
}
?>