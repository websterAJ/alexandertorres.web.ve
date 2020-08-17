<?php
class responsehelper
{
	public $result     = null;
	public $response   = false;
	public $message    = 'Ocurrio un error inesperado.';
	public $href       = null;
	public $function   = null;
	
	public $filter     = null;
	
	public function SetResponse($r, $msg = '')
	{
		if(!$r && $msg == '') $this->message = 'Ocurrio un error inesperado';
		else $this->message = $msg;

		$this->response = $r;
	}
}