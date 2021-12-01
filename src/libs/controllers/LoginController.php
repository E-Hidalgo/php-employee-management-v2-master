<?php
defined('BASEPATH') or exit('No se permite acceso directo');

require_once LIBS_ROUTE . 'models/LoginModel.php';
require_once LIBS_ROUTE . 'Session.php';

/**
 * Login controller
 */
class LoginController extends Controller
{
  private $model;

  private $session;

  public function __construct()
  {
    $this->model = new LoginModel();
    $this->session = new Session();
  }


  public function exec()
  {
    $this->render(__CLASS__);
  }

  public function signin($request_params)
  {

    if ($this->verify($request_params)) return $this->renderErrorMessage('El email y password son obligatorios');
    $result = $this->model->signIn($request_params['loginMail']);

    $result = $result->fetch();
    echo "<pre>";
    var_dump($result);


    if (count($result) === 0) return $this->renderErrorMessage("El email {$request_params['loginMail']} no fue encontrado");

    if (!password_verify($request_params['loginPassword'], $result['encrypted_password'])) return $this->renderErrorMessage('La contraseña es incorrecta');

    $this->session->init();
    $this->session->add('email', $result['email']);
    header('location: ' . FOLDER_PATH . '/Employee/all');
  }

  private function verify($request_params)
  {
    return empty($request_params['loginMail']) or empty($request_params['loginPassword']);
  }

  private function renderErrorMessage($message)
  {
    $params = array('error_message' => $message);
    $this->render(__CLASS__, $params);
  }
}