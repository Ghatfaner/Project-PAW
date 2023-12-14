<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../view/login.php');
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
  <title>Detail Movie</title>

  <style>
    body {
      overflow-x: hidden;
    }
    .fas {
      color: gold;
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
    .card a {
      border: none;
      background-color: #2B7761;
      color: #E6EFEC;
    }
    .card a:hover {
      background-color: #E6EFEC;
      color: #2B7761;
    }
    .container-card-big {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding-bottom: 15rem;
      background: linear-gradient(0deg, rgba(25, 31,44, 1), rgba(25, 31, 44, 0.9), rgba(35, 45, 63, 0));
      color: #E6EFEC;
    }
    .card-img {
      max-height: 32rem;
    }
    i, h5, p {
      padding: 0 0;
      margin: 0 0;
    }
    .movie-details-img {
      max-width: 20rem;
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
            <a class="nav-link text-white-50" href="../view/search.php">Search</a>
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

  <?php
    $movieId = intval($_GET['movieId']);
    include_once "../controller/control.php";
    $control = new Control();
    $action = $control->c_detailMovie($movieId);

    foreach ($action as $result) {
  ?>

  <!-- Card Image Big -->
  <div class="card border border-0 mb-5">
    <img src="../pictures/movie-wide/<?php echo $result['MovieId'] ?>.png" alt="" class="card-img">
    <div class="container-card-big">
      <div class="card-img-overlay px-5">

        <div class="card-title mb-3">
          <h3 class="card-title fs-1 fw-bold"><?php echo $result['Title'] ?></h3>
          <p class="card-text fs-5 fw-light"><?php echo $result['Synopsis'] ?></p>
        </div>

        <div class="rent-stock d-flex align-items-center gap-2 mb-3">
          <i class="fas fa-bag-shopping fa-2xl"></i>
          <span class="fs-5">Stock available</span>
        </div>

        <a href="../view/rent.php?movieId=<?= $result['MovieId'] ?>" class="btn px-3 py-2 fs-4 fw-semibold">Rent for $<?php echo $result['price'] ?></a>

      </div>
    </div>
  </div>

  <!-- Movie Details -->
  <div class=" movie-details container-fluid d-flex flex-column px-5 py-5">
    <div class="movie-details-logo d-flex flex-row justify-content-start align-items-center gap-2 mb-3">
      <i class="fas fa-film fa-2x"></i>
      <h5 class="fs-2 fw-bold">Movie Details</h5>
    </div>

    <!-- Movie Image Text -->
    <div class="movie-details d-flex flex-row gap-5 align-items-center">
      <img src="../pictures/movie-tall/<?php echo $result['MovieId'] ?>.jpg" alt="" class="movie-details-img rounded shadow-lg">

      <div class="movie-details-text">
        <h5 class="fs-1 fw-semibold mb-4">How Film-maker Make: </br> <?php echo $result['Title'] ?></h5>

        <div class="d-flex flex-column gap-1">
          <div class="duration d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-clock fa-lg"></i>
              <p class="fs-5 fw-semibold">Duration: <?php echo $result['Duration'] ?></p>
            </div>
          </div>

          <div class="release-date d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-calendar-days fa-lg"></i>
              <p class="fs-5 fw-semibold">Release Date: <?php echo $result['ReleaseDate'] ?></p>
            </div>
          </div>

          <div class="age-rating d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-user-group fa-lg"></i>
              <p class="fs-5 fw-semibold">Age Rating: <?php echo $result['AgeRating'] ?></p>
            </div>
          </div>

          <div class="genre d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-masks-theater fa-lg"></i>
              <p class="fs-5 fw-semibold">Genre: <?php echo $result['GenreName'] ?></p>
            </div>
          </div>

          <div class="actors d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-user-secret fa-lg"></i>
              <p class="fs-5 fw-semibold">Actor: <?php echo $result['actor'] ?></p>
            </div>
          </div>

          <div class="director d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-user-tie fa-lg"></i>
              <p class="fs-5 fw-semibold">Director: <?php echo $result['DirectorName'] ?></p>
            </div>
          </div>

          <div class="production-company d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-building fa-lg"></i>
              <p class="fs-5 fw-semibold">Production Company: <?php echo $result['CompaniesName'] ?></p>
            </div>
          </div>

          <div class="rent-price d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-money-bill-wave fa-lg"></i>
              <p class="fs-5 fw-semibold">Rent Price: <?php echo $result['price'] ?></p>
            </div>
          </div>

          <div class="stock d-flex flex-row gap-2">
            <div class="d-flex flex-row align-items-center gap-2">
              <i class="fas fa-layer-group fa-lg"></i>
              <p class="fs-5 fw-semibold">Stock: <?php echo $result['Stock'] ?></p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <?php
    }
  ?>

</body>
</html>