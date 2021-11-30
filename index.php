<?php

//  Add these lines somewhere on top of your PHP file: 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('BASEPATH', true);

require 'config.php';
require 'src/core/autoload.php';

/**
 * Nivel de errores notificados
 */
error_reporting(ERROR_REPORTING_LEVEL);

/**
 * Inicializa Router y detección de valores de la URI
 */
$router = new Router();

$controller = $router->getController();
$method = $router->getMethod();
$param = $router->getParam();

/**
 * Validaciones e inclusión del controlador y el metodo 
 */
if (!CoreHelper::validateController($controller)) {
  $controller = 'ErrorPage';
}

$controller .= 'Controller';
require PATH_CONTROLLERS . "{$controller}.php";

var_dump(PATH_CONTROLLERS . "{$controller}.php");


if (!CoreHelper::validateMethodController($controller, $method))
  $method = 'exec';

/**
 * Ejecución final del controlador, método y parámetro obtenido por URI
 */
$controller = new $controller;

$controller->$method($param);