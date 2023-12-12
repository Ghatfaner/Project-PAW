<?php

  include_once "../model/model.php";

  class control {

    public $model;

    public function __construct() {
      $this->model = new model();
    }

    public function c_signUp($username, $email, $password, $address, $phoneNumber, $occupation) {
      return $this->model->m_signUp($username, $email, $password, $address, $phoneNumber, $occupation);
      include_once "../view/registration.php";
    }

    public function c_singIn($identifier, $password) {
      return $this->model->m_signIn($identifier, $password);
      include_once "../view/index.php";
    }

  }

?>