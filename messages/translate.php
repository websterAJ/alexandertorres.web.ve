<?php 

class translate {
	
	static function msg($data)
	{
		$messages = array(
		'name_user' => 'Nombre de usuarios',
		'pass_user' => 'Contraseña',
		'type_user' => 'Tipo de usuarios',
		'statud_user' => 'Estado de usuarios'
	);
		if (isset($messages[$data])) {
			return $messages[$data];
		}else{
			return $data;
		}
	}

}



 ?>