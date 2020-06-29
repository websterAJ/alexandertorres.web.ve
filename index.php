<?php

require_once 'config/config.php';

// Cargamos el core de nuestro aplicativo
require_once 'core/errorcontroller.php';
require_once 'core/frontcontroller.php';
require_once 'core/controller.php';
require_once 'core/dataaccesslayer.php';
require_once 'core/session.php';
require_once 'messages/translate.php';

// Cargamos algunos helper por defecto
require_once 'helper/responsehelper.php';
require_once 'helper/basehelper.php';
require_once 'helper/formhelper.php';


// Creamos una instancia de nuestro FrontController
new FrontController();
?>