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

    public function m_signIn($email, $password) {
      $query = $this->database->query("SELECT COUNT(*) as output
                                           FROM user
                                           WHERE Email = '$email'
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

    public function popularAction() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'action'
                                     limit 4;");
    }

    public function popularComedy() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'comedy'
                                     limit 4;");
    }

    public function popularAnimation() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'animation'
                                     limit 4;");
    }

    public function popularHorror() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'horror'
                                     limit 4;");
    }

    public function popularScifi() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'science fiction'
                                     limit 4;");
    }

    public function popularDocumentary() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'documentary'
                                     limit 4;");
    }

    public function detailMovie($movieID) {
      return $this->database->query("SELECT MovieId, CompaniesName, 
                                            DirectorName, GenreName, Title, 
                                            ReleaseDate, Duration, Synopsis, 
                                            AgeRating, Stock, price, 
                                            (select ActorName
                                             natural join Casting
                                             where Casting.MovieId = '$movieID') as actor
                                    from movie
                                    natural join genre
                                    natural join director
                                    natural join moviecompany
                                    where MovieId = '$movieID'; ");
    }

    public function searchMovie($identifier) {
      return $this->database->query("SELECT MovieId, Title, Duration, ReleaseDate, GenreName, Stock
                                     from movie
                                     natural join genre
                                     where Title like concat('%', '$identifier', '%') or
                                     GenreName like '$identifier'; ");
    }

    public function sortAscending() {
      return $this->database->query("SELECT Title, year(ReleaseDate) as year, AgeRating, Synopsis
                                     from movie
                                     order by Title;");
    }

  
  }

?>