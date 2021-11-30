<?php
defined('BASEPATH') or exit('No se permite acceso directo');
require_once LIBS_ROUTE . 'models/EmployeeModel.php';
/**
 * 
 */
class EmployeeController extends Controller
{
  public $path_inicio;

  public function __construct()
  {
    $this->path_inicio = FOLDER_PATH;
  }

  public function exec()
  {


    $this->render(__class__, array('path_inicio' => $this->path_inicio));
  }

  function all()
  {
    $employees = 'helo';
    $this->render(__class__, array('employees' => $employees));
  }

  function edit($id)
  {
    $this->render(__class__, array('id' => $id));
  }

  function getAllEmployees()
  {
    $model = new EmployeeModel();
    $employees = $model->getAll();
    echo json_encode($employees);
  }

  function add($params)
  {
    $employee = json_decode(array_keys($params)[0], true);
    $model = new EmployeeModel();
    $res = $model->create($employee);
    var_dump($res);
  }

  function update($employeeId)
  {
  }

  function delete($employeeId)
  {
  }
}