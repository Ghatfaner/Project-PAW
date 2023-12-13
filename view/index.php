<?php
session_start();

if (!isset($_SESSION['userId'])) {
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
  <title>Document</title>

  <style>
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
    .carousel-item {
      height: 32rem;
      background: #232D3F;
      color: #e7e7e7;
      position: relative;
      background-position: center;
      background-size: cover;
    }
    .container {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      padding-bottom: 3rem;
    }
    .overlay-image {
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-position: center;
      background-size: cover;
      opacity: 0.5;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-4">

      <a class="navbar-brand" href="../view/index.php">
        <img src="../pictures/Logo-Light-Small.png" alt="">
      </a>

      <div class="d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="../view/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="../view/search.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="../view/">Category</a>
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

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="overlay-image" style="background-image:url(../pictures/slide-1.jpg);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg btn-primary">
            Read more
          </a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image:url(../pictures/slide-2.jpg);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg btn-primary">
            Read more
          </a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image:url(../pictures/slide-3.jpg);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg btn-primary">
            Read more
          </a>
        </div>
      </div>
    </div>
    <a href="#myCarousel" class="carousel-control-prev" role="button" data-bs-slide="prev">
      <span class="sr-only">Previous</span>
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </a>
    <a href="#myCarousel" class="carousel-control-next" role="button" data-bs-slide="next">
      <span class="sr-only">Next</span>
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <a href="../controller/logout.php" class="btn btn-warning">logout</a>

</body>
</html>
