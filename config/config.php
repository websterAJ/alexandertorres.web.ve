<?php 
define('TITLE', 'Alexander torres');
date_default_timezone_set('America/Caracas');
define('_BASE_URL_', 'http://' . $_SERVER['HTTP_HOST'] . '/alexandertorres.web.ve/');
define('_BASE_FOLDER_', str_replace('index.php', '', $_SERVER['DOCUMENT_ROOT'].'/alexandertorres.web.ve/'));
define('_DEFAULT_CONTROLLER_', 'inicio');
define('_DB_CONNECTION_STRING_', 'mysql:host=localhost;dbname=alexandertorres|atorres|23124156');
define('MODE', 'DEV');
 ?>