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

    <div class="input-group mb-3">
      <form action="search.php" method="GET" class="d-inline">
        <input type="text" name="identifier" class="form-control" placeholder="Search movies or genres..." aria-label="Recipient's username" aria-describedby="button-addon2">
        <button class="btn btn-outline-secondary" name="search"  type="submit" id="button-addon2">Search</button>
      </form>
    </div>

    <?php
      include_once '../controller/control.php';
      $control = new Control();

      if (isset($_GET['search'])) {
        $identifier = $_GET['identifier'];
        $action = $control->c_searchMovie($identifier);
        
        foreach($action as $result) {
    ?>
    
      <!-- search result -->
    <div>
      <h3>Title: <?php echo $result['Title'] ?></h3>
      <h6>Duration: <?php echo $result['Duration'] ?></h6>
      <h6>Release Date: <?php echo $result['year'] ?></h6>
      <h6>Genre: <?php echo $result['GenreName'] ?></h6><br>

      <?php
        if ($result['Stock'] > 0 ) {
      ?>
      <p>Available to rent</p>
      <?php
        }
      ?>
      <div class="card-btn"><a href="detail.php?movieId=<?= $result['MovieId'] ?>" class="btn">More Detail</a></div>
    </div>

    <?php
        }
      } 
    ?>
</body>
</html>