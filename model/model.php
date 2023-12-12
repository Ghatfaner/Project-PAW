<?php

  require_once "../connDB.php";

  class model {

    private $database;
    
    public function __construct() {
      $this->database = new connDB();
      $this->database = $this->database->mysqli;
    }

    public function m_signUp($username, $email, $password, $address, $phoneNumber, $occupation) {
      $userExist = $this->database->query("SELECT count(*) 
                                           FROM user
                                           WHERE Username = '$username' OR Email = '$email';");
      $userExist = $userExist->fetch_assoc();
  
      if ($userExist['count(*)'] == 0) {
          $this->database->query("INSERT INTO user(username, email, password, address, phonenumber, occupation)
                                  VALUES ('$username', '$email', '$password', '$address', '$phoneNumber', '$occupation');");
          return 'success';
      } else {
          return 'failed';
      }
    }

    public function m_signIn($identifier, $password) {
      $query = $this->database->query("SELECT COUNT(*) as output
                                           FROM user
                                           WHERE (Username = '$identifier' OR Email = '$identifier')
                                           AND Password = '$password';");
      $userExist = $query->fetch_assoc();

      if ($userExist['output'] == 1) {
        $query = $this->database->query("SELECT UserId
                                FROM user
                                WHERE (Username = '$identifier' OR Email = '$identifier')
                                AND Password = '$password'; ");
        $userID = $query->fetch_assoc();           
        return $userID['UserId'];
      } else {
        return 'failed';
      }
      
    }

  
  }

?>