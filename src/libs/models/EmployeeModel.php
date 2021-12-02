<?php

# Employee Class
/**
 * 
 */
class EmployeeModel extends Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function getAll()
  {
    $sql = "SELECT * FROM employees;";
    return $this->db->query($sql)->fetchAll();
  }

  public function create($employee)
  {
    var_dump($employee);
    $id = $this->getNextIdentifier();
    $name = $employee['firstName'];
    $email = str_replace('_', '.', $employee['email']);
    $age = $employee['age'];
    $address = $employee['streetAdress'];
    $city = $employee['city'];
    $state = $employee['stateName'];
    $postalCode = $employee['postalCode'];
    $phone = $employee['phoneNumber'];

    $sql = "INSERT INTO employees (
      emp_id, 
      firstName,
      email, 
      age,
      streetAdress, 
      city,
      stateName,
      postalCode,
      phoneNumber
       ) VALUES (
      $id,
      '$name',
      '$email',
      '$age',
      '$address',
      '$city',
      '$state',
      '$postalCode',
      '$phone'
    )";
    return $this->db->query($sql);
    // var_dump($this->db->query($sql));
  }

  function getNextIdentifier()
  {
    $sql = "SELECT id from employees ORDER BY id DESC LIMIT 1;";
    $last = $this->db->query($sql)->fetch()['id'];
    return $last + 1;
  }
  # Get employee by ID

  function deleteEmployee($employeeId)
  {
    $sql = "DELETE FROM employees WHERE id = $employeeId;";
    // var_dump($this->db->query($sql)->fetch());

    return $this->db->query($sql)->fetch();
  }

  function updateEmployee($employee)
  {
    var_dump($employee);
    die();
    $sql = "UPDATE  employees
     SET
      firstName = $employee[2],
      email =$employee[3],
      age =$employee[8],
      streetAdress =$employee[6],
      city =$employee[5],
      stateName =$employee[7],
      postalCode =$employee[9],
      phoneNumber =$employee[10],
     WHERE
      id = $employee[0];";

    return $this->db->query($sql)->fetch();
  }
  # Add new employee 
  # Update employee by ID
  # Delete employee by ID
}