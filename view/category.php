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

  <title>Category</title>

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
    /* .carousel-item {
      height: 36rem;
      background: #232D3F;
      color: #e7e7e7;
      position: relative;
      background-position: center;
      background-size: cover;
    } */
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
    .card {
      background-color: #232D3F;
      color: #e7e7e7;
    }
    .card-img-top {
      height: 12rem;
      object-fit: cover;
    }
    .card-body-action {
      padding: 24px 24px;
      height: 20rem;
    }
    .card-text-action {
      margin-bottom: 1rem;
      height: 10rem;
    }
    .card-text-action span {
      font-size: 0.9rem;
    }
    .card-text-action p {
      font-size: 0.9rem;
      margin-top: 0.5rem;
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
    .form-select option {
      background-color: #232D3F;
      color: #e7e7e7;
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
            <a class="nav-link text-white-50" aria-current="page" href="../view/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50" href="../view/search.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active text-white" href="../view/category.php">Category</a>
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
  
  <div class="container-card mt-5 mb-5">
    <div class="row px-5">
  
  <form action="category.php" method="get">
    <div class="mb-2 fs-4 fw-semibold">Sort by:</div> 
    <select class="form-select bg-success text-light border border-0 shadow-lg" style="--bs-bg-opacity: .5" aria-label="Default select example" name="sort" onchange="this.form.submit()">
      <option selected>Choose...</option>
      <option value="ascending">Ascending (A-Z)</option>
      <option value="descending">Descending (Z-A)</option>
      <option value="latest">Date (Latest)</option>
      <option value="oldest">Date (Oldest)</option>
      <option value="lowerPrice">Lower Price</option>
      <option value="higherPrice">Higher Price</option>
      <option value="age">Age Rating</option>
    </select>
</form>

<?php
  include_once '../controller/control.php';
  $control = new Control();

  $sortOption = $_GET['sort'] ?? 'latest';

  switch ($sortOption) {
    case 'ascending':
      $action = $control->c_sortAscending();
      break;
    case 'descending':
      $action = $control->c_sortDescending();
      break;
    case 'latest':
      $action = $control->c_sortNewest();
      break;
    case 'oldest':
      $action = $control->c_sortOldest();
      break;
    case 'lowerPrice':
      $action = $control->c_sortLowerPrice();
      break;
    case 'higherPrice':
      $action = $control->c_sortHigherPrice();
      break;
    case 'age':
      $action = $control->c_sortAgeRating();
      break;
    default:
      $action = $control->c_sortNewest();
      break;
  }
?>


    <!-- jgn lupa cardnya ditambahin buat price, di figma blm ad soalnyaa -->
    
    <?php
      foreach ($action as $sort) {
    ?>
    
    <div class="col-3 my-3">
        <div class="card border border-0">
          <img src="../pictures/movie-wide/<?php echo $sort['MovieId'] ?>.png" class="card-img-top" alt="...">

          <div class="card-body-action">
            <h5 class="card-title-action mb-3"><?php echo $sort['Title'] ?></h5>
            <div class="card-text-action fs-6">
              <span><?php echo $sort['year'] ?></span> 
              <span class="rounded p-1 bg-secondary"><?php echo $sort['AgeRating'] ?></span> 
              <span class="rounded p-1 bg-secondary"><?php echo $sort['GenreName'] ?></span> 
              <span class="rounded p-1 bg-secondary">$<?php echo $sort['Price'] ?></span>
              <p><?php echo $sort['Synopsis'] ?></p>
            </div>
            <div class="card-btn"><a href="#" class="btn">More Detail</a></div>
          </div>
        </div>
      </div>

    <?php
      }
    ?>

    </div>
  </div>

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
