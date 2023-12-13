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
  <title>Home</title>

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
    .footer {
      background-color: #005B41;
      color: #E6EFEC;
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
      height: 36rem;
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
    .container a{
      border: none;
      background-color: #2B7761;
      color: #E6EFEC;
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
    .card-img {
      max-height: 32rem;
      opacity: 0.5;
    }
    .card-img-top {
      height: 12rem;
      object-fit: cover;
    }
    .container-card-big {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      border-radius: 0 0 0.25rem 0.25rem;
      padding-bottom: 11rem;
      background: linear-gradient(0deg, rgba(0, 0, 0, 0.5), rgba(35, 45, 63, 0));
    }
    .card {
      background-color: #232D3F;
      color: #e7e7e7;
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
            <a class="nav-link active text-white" aria-current="page" href="../view/index.php">Home</a>
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

  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="overlay-image" style="background-image:url(../pictures/movie-wide/1.png);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg ">
            Read more
          </a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image:url(../pictures/movie-wide/2.png);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg ">
            Read more
          </a>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image" style="background-image:url(../pictures/movie-wide/3.png);"></div>
        <div class="container">
          <h1>Example headline</h1>
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis esse qui molestias beatae explicabo alias et tempore. Tempore vel distinctio reprehenderit est repellendus nesciunt impedit cumque! Debitis velit accusantium rem.</p>
          <a href="#" class="btn btn-lg ">
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

  <div class="container-card mt-5 mb-5">
    <div class="row px-5">
      <h3 class="mb-3">Popular Actions</h3>
      
      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/14.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/17.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/47.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/45.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="container-card mt-5 mb-5">
    <div class="row px-5">
      <h3 class="mb-3">Popular Documentaries</h3>
      
      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/7.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/35.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/8.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/29.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

    </div>
  </div>

  <div class="px-5">
    <div class="card rounded">
      <img src="../pictures/thumbnail/thumbnail-1.png" alt="" class="card-img">
      <div class="container-card-big">
        <div class="card-img-overlay px-5">
          <h3 class="card-title">Card title</h3>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn px-3 py-2">Go somewhere</a>
        </div>
      </div>
    </div>
  </div>

  <div class="container-card mt-5 mb-5">
    <div class="row px-5">
      <h3 class="mb-3">Upcoming Review Movies</h3>
      
      <div class="col">
        <div class="card border border-0">
          <img src="../pictures/up-movie-wide/up-1.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card border border-0">
          <img src="../pictures/up-movie-wide/up-2.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card border border-0">
          <img src="../pictures/up-movie-wide/up-3.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn">Go somewhere</a>
          </div>
        </div>
      </div>

    </div>
  </div>
  
  <div class="px-5"><a href="../controller/logout.php" class="btn btn-warning w-100 mb-5 fs-3 fw-semibold">Logout</a></div>

  <div class="footer">
    <div class="container-fluid px-5 py-5 d-flex flex-column">
      <div class="pb-5">
        <img src="../pictures/Logo-Light-Small.png" alt="">
      </div>
      <div class="row">
        <div class="col-3">
          <h5 class="mb-3">Home</h5>
          <p>Discover a variety of exciting content and explore the latest updates.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Search</h5>
          <p>See relevant information quickly and easily using our powerful search feature.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Category</h5>
          <p>Explore a wide range of categories and find content tailored to your interests.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Social Media</h5>
          <p>Connect with us on social media for the latest updates and engaging content.</p>
          <div class="text-dark d-flex flex-row justify-content-start gap-2">
            <div>
              <i class="fab fa-facebook-square fa-3x"></i>
            </div>
            <div>
              <i class="fab fa-whatsapp-square fa-3x"></i>
            </div>
            <div>
              <i class="fab fa-twitter-square fa-3x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
