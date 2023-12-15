<?php

class connDB {
  public $mysqli;

  public function __construct() {
    $hostName = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "paw";
    $conn = mysqli_connect($hostName, $dbUser, $dbPass, $dbName);
    // ganti user ma password sesuai database masing2
    // p.s. milzam & ghatfan

    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } else {
      $this->mysqli = $conn;
    }
  }
}
