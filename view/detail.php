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

  <title>Detail Movie</title>

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

<div>
  <!-- header  -->
  <h1>title here</h1>
  <p>descrption here</p>
  <h5>stock available</h5>
  <button>rent</button> <button>bookmark</button> 
</div>
<br>
<div>
  <!-- detail -->
  <h4>Movie Details</h4>
  <img src="" alt="">
  <h2>title here</h2>
  <h4>Duration:</h4>
  <h4>Release Date:</h4>
  <h4>Age Rating:</h4>
  <h4>Genre:</h4>
  <h4>Actors:</h4>
  <h4>Production Company:</h4>
  <h4>Rent Price:</h4>
  <h4>Stock:</h4>
</div>
<br>
<div>
  <!-- preview -->
  <h4>Watch Crews and Behind-The-Scenes</h4><br>
  <img src="" alt=""> <img src="" alt=""> <img src="" alt="">
</div>

</body>
</html>