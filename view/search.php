<?php
session_start();

if(!isset($_SESSION['userId'])) {
  header("Location: login.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/styles.css">
  
  <link rel="icon" href="../pictures/Logo-Light-Small.png" type="image/x-icon">
  <title>Search</title>

  <style>
    body {
      overflow-x: hidden;
    }
    .navbar {
      background-color: #005B41;
    }
    .navbar-brand img {
      width: 100%;
    }
    .container-fluid {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    .nav-item {
      margin-right: 12px;
    }
    .movie-search {
      background-color: #232D3F;
      border-radius: 10px;
    }
    .movie-search-img{
      height: 18rem;
    }
    .btn{
      background-color: #2B7761;
      color: #E6EFEC;
      border: none;
      border-radius: 10px;
      padding: 0.5rem 1rem;
    }
    .btn:hover {
      background-color: #E6EFEC;
      color: #2B7761;
    }
  </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg sticky-top">
      <div class="container-fluid px-4">

        <a class="navbar-brand" href="../view/index.php">
          <img src="../pictures/Logo-Light-Small.png" alt="">
        </a>

        <div class="d-flex justify-content-end" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link text-white-50" aria-current="page" href="../view/index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active text-white" href="../view/search.php">Search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white-50" href="../view/category.php">Category</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white-50" href="../view/bookmark.php">Bookmark</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white-50" href="../view/profile.php">Profile</a>
            </li>
          </ul>
        </div>

      </div>
    </nav>

    <div class="container-fluid d-flex flex-column px-5 py-5">
      
      <form action="search.php" method="GET" class="d-flex flex-row gap-1 mb-3">
        <input type="text" name="identifier" class="form-control py-2" placeholder="Search movies or genres..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" name="search"  type="submit" id="button-addon2">Search</button>
      </form>

      <?php
        include_once '../controller/control.php';
        $control = new Control();

        if (isset($_GET['search'])) {
          $identifier = $_GET['identifier'];
          $action = $control->c_searchMovie($identifier);
          
          if(empty($_GET['identifier'])) {
            echo "<h3 class='fs-3 fw-semibold mt-5 mb-4 text-center opacity-50'>Please enter a movie or genre name.</h3>";
          } else {
            foreach($action as $result) {
      ?>
      
      <!-- search result -->
      <div class="movie-search d-flex flex-row align-items-center gap-3 px-3 py-3 mb-3">
        <img src="../pictures/movie-tall/<?php echo $result['MovieId'] ?>.jpg" alt="" class="movie-search-img rounded">
        <div class="movie-search-text">
          <h3 class="fs-3 fw-semibold mb-4">How Film-maker Make: </br><?php echo $result['Title'] ?></h3>
          
          <div class="d-flex flex-column gap-1 mb-3">
            <div class="d-flex flex-row align-items-center gap-2">
              <h6 class="fs-5 fw-medium">Duration:</h6>
              <h6 class="fs-5 fw-normal"> <?php echo $result['Duration'] ?></h6>
            </div>
            <div class="d-flex flex-row align-items-center gap-2">
              <h6 class="fs-5 fw-medium">Release Date: </h6>
              <h6 class="fs-5 fw-normal"><?php echo $result['year'] ?></h6>
            </div>
            <div class="d-flex flex-row align-items-center gap-2">
              <h6 class="fs-5 fw-medium">Genre: </h6>
              <h6 class="fs-5 fw-normal"><?php echo $result['GenreName'] ?></h6>
            </div>
          </div>

          <a href="detail.php?movieId=<?= $result['MovieId'] ?>" class="btn">More Detail</a>
        </div>
      </div>

      <?php
            }
          }
        } 
      ?>
    </div>
</body>
</html>