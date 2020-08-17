<?php
class jqgridhelper
{
	public $page     = 0;
	public $total    = 0;
	public $records  = 0;
	public $start    = 0;
	public $limit    = 0;
	
	public $sord     = '';
	public $rows     = array();

	public function Config($count)
	{
		if (!empty($_REQUEST)) {
			$this->sord    = $_REQUEST['sidx'] . ' ' . $_REQUEST['sord'];
			$total_pages   = $count > 0 ? ceil($count/$_REQUEST['rows']) : 0;
			$this->start   = $_REQUEST['rows'] * $_REQUEST['page'] - $_REQUEST['rows'];
			$this->limit   = $_REQUEST['rows'];
			
			$this->page    = $_REQUEST['page'];
			$this->total   = $total_pages;
			$this->records = $count;
		}
		
	}
	public function DataSource($data)
	{
		$this->rows = $data;		
	}
}