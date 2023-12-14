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
                                WHERE Email = '$email'

                                AND Password = '$password'; ");
        $userID = $query->fetch_assoc();           
        return $userID['UserId'];
      } else {
        return 'failed';
      }
      
    }

    public function m_popularAction() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'action'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_popularComedy() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'comedy'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_popularAnimation() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'animation'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_popularHorror() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'horror'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_popularScifi() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'science fiction'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_popularDocumentary() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from Movie
                                     natural join Genre
                                     where GenreName = 'documentary'
                                     ORDER BY RAND()
                                     limit 4;");
    }

    public function m_detailMovie($movieId) {
      return $this->database->query("SELECT MovieId, CompaniesName, 
                                            DirectorName, GenreName, Title, 
                                            ReleaseDate, Duration, Synopsis, 
                                            AgeRating, Stock, price, 
                                            (select ActorName
                                             from actor
                                             natural join Casting
                                             where Casting.MovieId = '$movieId') as actor
                                    from movie
                                    natural join genre
                                    natural join director
                                    natural join moviecompany
                                    where MovieId = '$movieId'; ");
    }

    public function m_searchMovie($identifier) {
      return $this->database->query("SELECT MovieId, Title, Duration, year(ReleaseDate) as year, GenreName, Stock
                                     from movie
                                     natural join genre
                                     where Title like concat('%', '$identifier', '%') or
                                     GenreName like concat('%', '$identifier', '%'); ");
    }

    public function m_sortAscending() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by Title;");
    }

    public function m_sortDescending() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by Title desc;");
    }

    public function m_sortLowerPrice() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by price;");
    }

    public function m_sortHigherPrice() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by price desc;");
    }

    public function m_sortAgeRating() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by AgeRating;"); 
    }

    public function m_sortOldest() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by ReleaseDate;"); 
    }

    public function m_sortNewest() {
      return $this->database->query("SELECT MovieId, Title, year(ReleaseDate) as year, AgeRating, Synopsis, GenreName, Price
                                     from movie
                                     natural join Genre
                                     order by ReleaseDate desc;"); 
    }

    public function m_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation) {
      $this->database->query("UPDATE user
                              set
                                  Username = case when '$username' = '' then Username else '$username' end,
                                  Email = case when '$email' = '' then Email else '$email' end,
                                  Password = case when '$password' = '' then Password else '$password' end,
                                  Address = case when '$address' = '' then Address else '$address' end,
                                  PhoneNumber = case when '$phoneNumber' = '' then PhoneNumber else '$phoneNumber' end,
                                  Occupation = case when '$occupation' = '' then Occupation else '$occupation' end
                              where UserId = '$userId'; ");
    }

    public function m_getProfile($userId) {
      return $this->database->query("SELECT Username, Email, Password, Address, PhoneNumber, Occupation
                                     from user
                                     where UserId = '$userId'; ");
    }

    public function m_addBookmark($userId, $movieId) {
      $this->database->query("INSERT INTO bookmark(UserId, MovieId)
                              VALUES ('$userId', '$movieId'); ");
    }

    public function m_deleteBookmark($userId, $movieId) {
      $this->database->query("DELETE from bookmark
                              where UserId = '$userId'
                              and MovieId = '$movieId'; ");
    }

    public function m_getBookmark($userId) {
      return $this->database->query("SELECT Title, Duration, ReleaseDate, GenreName
                                     from bookmark
                                     join Movie on Movie.MovieId = bookmark.MovieId
                                     join genre on Genre.GenreId = Movie.GenreId
                                     where UserId = '$userId'; ");
    }

    public function m_addRating($userId, $movieId, $comment, $rating) {
      $this->database->query("INSERT INTO rate(UserId, MovieId, Comment, Rating)
                              VALUES ('$userId', '$movieId', '$comment', '$rating'); ");
    }

    public function m_getRating($movieId) {
      return $this->database->query("SELECT Username, Comment, Rating
                                     from rate
                                     join user on user.UserId = rating.UserId
                                     where MovieId = '$movieId'; ");
    }

    public function m_rent($userId, $movieId, $username, $address, $phoneNumber, $paymentMethod) {
      $this->database->query("INSERT into rent (userid, movieid, username, address, phonenumber, paymentmethod, status, ReturnDate)
                              values (UserId, MovieId, Username, Address, PhoneNumber, PaymentMethod, 'rent', current_timestamp + interval 3 day);");

      $this->database->query("UPDATE movie 
                              set Stock = Stock - 1
                              where MovieId = '$movieId'; ");
    }

    public function m_getRentHistory($rentId) {
      return $this->database->query("SELECT rent.username, title, paymentmethod, price, rentdate, returndate, status
                                     from rent
                                     join Movie on Movie.MovieId = rent.MovieId
                                     where rentId = '$rentId'; ");
    }

    public function m_return($rentId, $movieId) {
      $this->database->query("UPDATE rent
                              set 
                                  Status = 'returned', 
                                  returndate = current_timestamp
                              where rentId = '$rentId'; ");
                              
      $this->database->query("UPDATE movie 
                              set Stock = Stock + 1
                              where MovieId = '$movieId'; ");
    }

  }
?>