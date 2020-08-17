<?php
class basehelper
{
	public static function ArrayDebug($data)
	{
		echo '<pre>';
		print_r($data);
		echo '</pre>';
	}
	public static function GetDateTime()
	{
		return date('Y-m-d h:i:s');
	}
	public static function IsAjaxRequest()
	{
		return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
	}
	public static function ParseRequestParameterToEntity($entity, $parameters)
	{
		foreach($parameters as $k => $p)
		{
			if(is_array($p)) 
			{
				$entity->{$k} = (object) $p;
			}

			// aca deberiamos aplicar filtros de seguridad
			$entity->$k = $p;
		}

		return $entity;
	}
	public static function GetEntity($nombre)
	{
		$dal = new dataaccesslayer();
		return $dal->GetEntity($nombre);
	}
	//error,clase,funcion
	public static function ELog(Exception $e){
		$fo = fopen( _BASE_FOLDER_ . 'log/' . date('Ymd').'.log','a');
		fwrite($fo,"\r\n[".date("r")."] " . $e->getTraceAsString() . "\r\n" . $e->getMessage());
		fclose($fo);
	}

    public static function GetFileSize($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
	}
	public static function TipoDeArchivo($mime)
	{
		if($mime == 'image/jpeg')
			return 1;
		if($mime == 'image/pjpeg')
			return 1;
		if($mime == 'image/gif')
			return 1;
		if($mime == 'image/x-png')
			return 1;
		if($mime == 'image/png')
			return 1;

		return 2;
	}
}