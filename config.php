<?php
defined('BASEPATH') or exit('No se permite acceso directo');

//////////////////////////////////////
// Valores de uri
/////////////////////////////////////

define('URI', $_SERVER['REQUEST_URI']);

define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//////////////////////////////////////
// Valores de rutas
/////////////////////////////////////

define('FOLDER_PATH', '/FORKS/php-employee-management-v2-master'); //! ADDED FORKS PATH

define('ROOT', $_SERVER['DOCUMENT_ROOT']);

define('PATH_VIEWS', FOLDER_PATH . '/src/libs/views/');

define('PATH_CONTROLLERS', 'src/libs/controllers/');

define('HELPER_PATH', 'src/helpers/');

define('LIBS_ROUTE', ROOT . FOLDER_PATH . '/src/libs/');

//////////////////////////////////////
// Valores de core
/////////////////////////////////////

define('CORE', 'src/core/');
define('DEFAULT_CONTROLLER', 'Login');

//////////////////////////////////////
// Valores de base de datos
/////////////////////////////////////

define('HOST', 'localhost'); // in Mac 127.0.0.1
define('DB', 'V2');
define('USER', 'root');
define('PASSWORD', '');
define('CHARSET', 'utf8mb4');

//////////////////////////////////////
// Valores configuracion
/////////////////////////////////////

define('ERROR_REPORTING_LEVEL', -1);