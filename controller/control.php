<?php

  include_once "../model/model.php";

  class control {

    public $model;

    public function __construct() {
      $this->model = new model();
    }

    public function c_signUp($username, $email, $password, $address, $phoneNumber, $occupation) {
      return $this->model->m_signUp($username, $email, $password, $address, $phoneNumber, $occupation);
      include_once "../view/login.php";
    }

    public function c_signIn($email, $password) {
      return $this->model->m_signIn($email, $password);
      include_once "../view/index.php";
    }

    public function c_popularAction() {
      return $this->model->m_popularAction();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function  c_popularComedy(){
      return $this->model->m_popularComedy();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function c_popularAnimation(){
      return $this->model->m_popularAnimation();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function c_popularHorror(){
      return $this->model->m_popularHorror();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function c_popularScifi(){
      return $this->model->m_popularScifi();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function c_popularDocumentary(){
      return $this->model->m_popularDocumentary();
      include_once "../view/index.php"; // bruh ini ak gatau file buat homepage namanya apa
    }

    public function c_detailMovie($movieID){
      return $this->model->m_detailMovie($movieID);
      include_once ""; // ini ak gatau ntar ditaroh ke file mana
    }

    public function c_searchMovie($identifier){
      return $this->model->m_searchMovie($identifier);
      include_once ""; 
    }

    public function c_sortAscending(){
      return $this->model->m_sortAscending();
      include_once ""; 
    }

    public function c_sortDescending(){
      return $this->model->m_sortDescending();
      include_once ""; 
    }

    public function c_sortLowerPrice(){
      return $this->model->m_sortLowerPrice();
      include_once ""; 
    }

    public function c_sortHigherPrice(){
      return $this->model->m_sortHigherPrice();
      include_once ""; 
    }

    public function c_sortAgeRating() {
      return $this->model->m_sortAgeRating();
      include_once ""; 
    }

    public function c_sortOldest() {
      return $this->model->m_sortOldest();
      include_once ""; 
    }

    public function c_sortNewest() {
      return $this->model->m_sortNewest();
      include_once"";    
    }

    public function c_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation) {
      $this->model->m_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation);
      include_once "../view/editProfile.php";
    }



    


  }

?>