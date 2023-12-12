<?php

class MVCconnect {
  public $mysqli;

  public function __construct() {
      $this->mysqli = mysqli_connect("127.0.0.1:3306", "root", "etherealZ4M.", "paw");
      // ganti user ma password sesuai database masing2
      // p.s. milzam

      // Check connection and throw exception if it fails
      if (mysqli_connect_errno()) {
        die("Connection failed: " . $this->mysqli->connect_error);
      }
  }

}

?>