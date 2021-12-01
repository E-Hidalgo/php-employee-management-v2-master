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

    $id = $this->getNextIdentifier();
    $name = $employee['firstName'];
    $email = $employee['email'];
    $age = $employee['age'];
    $city = $employee['city'];
    $state = $employee['stateName'];
    $postalCode = $employee['postalCode'];
    $phone = $employee['phoneNumber'];

    $sql = "INSERT INTO employees 
    (
      emp_id, 
      firstName,
      email, 
      age, 
      city,
      stateName,
      postalCode,
      phoneNumber
       ) VALUES (
      $id,
      $name,
      $email,
      $age,
      $city,
      $state,
      $postalCode,
      $phone
    )";
    return $this->db->query($sql);
  }

  function getNextIdentifier()
  {
    $sql = "SELECT id from employees ORDER BY id DESC LIMIT 1;";
    $last = $this->db->query($sql)->fetch()['id'];
    return $last + 1;
  }
  # Get employee by ID
  # Add new employee 
  # Update employee by ID
  # Delete employee by ID
}