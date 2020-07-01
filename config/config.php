<?php 
define('TITLE', 'Alexander torres');
date_default_timezone_set('America/Caracas');
define('_BASE_URL_', 'http://' . $_SERVER['HTTP_HOST'] . '/');
define('_BASE_FOLDER_', str_replace('index.php', '', $_SERVER['DOCUMENT_ROOT'].'/'));
define('_DEFAULT_CONTROLLER_', 'inicio');
define('_DB_CONNECTION_STRING_', 'mysql:host=localhost;dbname=opusmedm_atorres|opusmedm_atorres|23124156Aj.');
define('MODE', 'dev');

 ?>