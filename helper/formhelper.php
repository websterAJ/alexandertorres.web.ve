<?php
class formhelper
{
	public $Controls = array();

	public function Input($name, $type, $required = false, $message = "Este campo es requerido.")
	{
		$input = '<input type="text" name="' . $name . '" data-required="' . ($required ? "true" : "false") . '" data-message="" />';
		$Controls[$name] = array($required, $message);

		return $input;
	}
	public function ShowError($name)
	{
		return $Controls[$name][1];
	}
}