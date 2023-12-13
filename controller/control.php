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
      include_once "../view/index.php"; 
    }

    public function  c_popularComedy(){
      return $this->model->m_popularComedy();
      include_once "../view/index.php"; 
    }

    public function c_popularAnimation(){
      return $this->model->m_popularAnimation();
      include_once "../view/index.php"; 
    }

    public function c_popularHorror(){
      return $this->model->m_popularHorror();
      include_once "../view/index.php"; 
    }

    public function c_popularScifi(){
      return $this->model->m_popularScifi();
      include_once "../view/index.php"; 
    }

    public function c_popularDocumentary(){
      return $this->model->m_popularDocumentary();
      include_once "../view/index.php"; 
    }

    public function c_detailMovie($movieID){
      return $this->model->m_detailMovie($movieID);
      include_once "../view/detail.php"; 
    }

    public function c_searchMovie($identifier){
      return $this->model->m_searchMovie($identifier);
      include_once "../view/search.php"; 
    }

    public function c_sortAscending(){
      return $this->model->m_sortAscending();
      include_once "../view/category.php"; 
    }

    public function c_sortDescending(){
      return $this->model->m_sortDescending();
      include_once "../view/category.php"; 
    }

    public function c_sortLowerPrice(){
      return $this->model->m_sortLowerPrice();
      include_once "../view/category.php"; 
    }

    public function c_sortHigherPrice(){
      return $this->model->m_sortHigherPrice();
      include_once "../view/category.php"; 
    }

    public function c_sortAgeRating() {
      return $this->model->m_sortAgeRating();
      include_once "../view/category.php"; 
    }

    public function c_sortOldest() {
      return $this->model->m_sortOldest();
      include_once "../view/category.php"; 
    }

    public function c_sortNewest() {
      return $this->model->m_sortNewest();
      include_once "../view/category.php";    
    }

    public function c_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation) {
      $this->model->m_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation);
    }

    public function c_getProfile($userId) {
      return $this->model->m_getProfile($userId);
      include_once "../view/profile.php";
    }

    public function c_addBookmark($userId, $movieId) {
      $this->model->m_addBookmark($userId, $movieId);
    }

    public function c_deleteBookmark($userId, $movieId) {
      $this->model->m_deleteBookmark($userId, $movieId);
    }

    public function c_getBookmark($userId) {
      return $this->model->m_getBookmark($userId);
      include_once "../view/bookmark.php";
    }

    public function c_addRating($userId, $movieId, $comment, $rating) {
      $this->model->m_addRating($userId, $movieId, $comment, $rating);
    }

    public function c_getRating($movieId) {
      return $this->model->m_getRating($movieId);
      include_once "../view/detail.php";
    }

    public function c_rent($userId, $movieId, $username, $address, $phoneNumber, $paymentMethod) {
      $this->model->m_rent($userId, $movieId, $username, $address, $phoneNumber, $paymentMethod);
    }

    public function c_getRentHistory($rentId) {
      return $this->model->m_getRentHistory($rentId);
      include_once "../view/profile.php"; 
    }

    public function c_return($rentId, $movieId) {
      $this->model->m_return($rentId, $movieId);
    }
  }

?>