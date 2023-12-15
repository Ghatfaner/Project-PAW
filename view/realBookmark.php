<?php
session_start();
if (!isset($_SESSION['userId'])) {
    header('Location: ../view/login.php');
    die();
}

  $movieId = intval($_GET['movieId']);

  if (isset($_GET['movieId'])) {
    include_once '../controller/control.php';
    $control = new Control();
    $control->c_addBookmark($_SESSION['userId'], $movieId);
  }

  // logic bookmark harusnya ga disini, klo disini, tiap nge refresh page bakal nambah bookmark

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
            <a class="nav-link text-white-50" href="../view/realBookmark.php">Bookmark</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="../view/profile.php">Profile</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <?php
    $action = $control->c_getBookmark($_SESSION['userId']);

    foreach ($action as $result) {
  ?>

<div class="container-fluid d-flex flex-column px-5 py-5">
  <div class="movie-search d-flex flex-row align-items-center gap-3 px-3 py-3 mb-3">
    <img src="../pictures/movie-tall/<?php echo $movieId ?>.jpg" alt="" class="movie-search-img rounded">
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

      <a href="detail.php?movieId=<?= $movieId ?>" class="btn">More Detail</a>
    </div>
  </div>
</div>
      
  <?php
    }
  ?>
</body>
</html>