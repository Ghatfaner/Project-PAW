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

      if ($userExist = 0) {
        $this->database->query("INSERT INTO user(username, email, password, address, phonenumber, occupation)
                                VALUES ('$username', '$email', '$password', '$address', '$phoneNumber', '$occupation');");
        return 'success';
      } else {
        return 'failed';
      }
    }

    public function m_signIn($identifier, $password) {
      $userExist = $this->database->query("SELECT COUNT(*)
                                           FROM user
                                           WHERE (Username = '$identifier' OR Email = '$identifier')
                                           AND Password = '$password';");

      if ($userExist = 1) {
        $userID = $this->database->query("SELECT UserId
                                FROM user
                                WHERE (Username = '$identifier' OR Email = '$identifier')
                                AND Password = '$password'; ");
                    
        return $userID;
      } else {
        return 'failed';
      }
      
    }

  
  }

?>