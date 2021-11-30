<?php 

# User login class
/**
* 
*/
class LoginModel extends Model
{
  
  public function __construct()
  {
    parent::__construct();
  }

  public function signIn($email)
  { 
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $sql = "SELECT email, encrypted_password FROM users WHERE email = '{$email}'";
    return $this->db->query($sql);
  }

  # Autenticate
  # Sanitizar
  # login
  # log-out
}