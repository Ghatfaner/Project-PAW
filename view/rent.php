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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/styles.css">
    
    <link rel="icon" href="../pictures/Logo-Light-Small.png" type="image/x-icon">
    <title>Rent Form</title>
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
      i, h5, p {
        padding: 0 0;
        margin: 0 0;
      }
      .form-card {
        background-color: #232D3F;
      }
      .movie-details-img {
        max-width: 18rem;
      }
      .fas {
        color: gold;
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


    <div class="container py-5">
      <div class="d-flex flex-row align-items-center gap-3 mb-3">
        <i class="fas fa-list fa-2xl"></i>
        <p class="fs-2 fw-bold">Rent Movie DCP’s Form</p>
      </div>

      <div class="form-card py-5 px-5 rounded shadow-lg">
        <!-- Movie Details & Form -->
        <?php
        $movieId = intval($_GET['movieId']);
        include_once "../controller/control.php";
        $control = new Control();
        $action = $control->c_detailMovie($movieId);

        foreach ($action as $result) {
        ?>
        <!-- Movie Image & Text -->
        <div class="movie-details d-flex flex-row gap-5 align-items-center">
          <img src="../pictures/movie-tall/<?php echo $result['MovieId']; ?>.jpg" alt="" class="movie-details-img rounded shadow-lg">

          <div class="movie-details-text">
        
          <h5 class="fs-1 fw-semibold mb-4">How Film-maker Make: </br> <?php echo $result['Title']; ?></h5>

          <div class="d-flex flex-column gap-1">
            <div class="duration d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-clock fa-lg"></i>
                <p class="fs-5 fw-semibold">Duration: </p>
                <p class="fs-5 fw-normal"><?php echo $result['Duration']; ?></p>
              </div>
            </div>

            <div class="release-date d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-calendar-days fa-lg"></i>
                <p class="fs-5 fw-semibold">Release Date: </p>
                <p class="fs-5 fw-normal"><?php echo $result['ReleaseDate']; ?></p>
              </div>
            </div>

            <div class="age-rating d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-user-group fa-lg"></i>
                <p class="fs-5 fw-semibold">Age Rating: </p>
                <p class="fs-5 fw-normal"><?php echo $result['AgeRating']; ?></p>
              </div>
            </div>

            <div class="genre d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-masks-theater fa-lg"></i>
                <p class="fs-5 fw-semibold">Genre: </p>
                <p class="fs-5 fw-normal"><?php echo $result['GenreName']; ?></p>
              </div>
            </div>

            <div class="actors d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-user-secret fa-lg"></i>
                <p class="fs-5 fw-semibold">Actor: </p>
                <p class="fs-5 fw-normal"><?php echo $result['actor']; ?></p>
              </div>
            </div>

            <div class="director d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-user-tie fa-lg"></i>
                <p class="fs-5 fw-semibold">Director: </p>
                <p class="fs-5 fw-normal"><?php echo $result['DirectorName']; ?></p>
              </div>
            </div>

            <div class="production-company d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-building fa-lg"></i>
                <p class="fs-5 fw-semibold">Production Company: </p>
                <p class="fs-5 fw-normal"><?php echo $result['CompaniesName']; ?></p>
              </div>
            </div>

            <div class="rent-price d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-money-bill-wave fa-lg"></i>
                <p class="fs-5 fw-semibold">Rent Price: </p>
                <p class="fs-5 fw-normal"><?php echo $result['price']; ?></p>
              </div>
            </div>

            <div class="stock d-flex flex-row gap-2">
              <div class="d-flex flex-row align-items-center gap-2">
                <i class="fas fa-layer-group fa-lg"></i>
                <p class="fs-5 fw-semibold">Stock: </p>
                <p class="fs-5 fw-normal"><?php echo $result['Stock']; ?></p>
              </div>
            </div>
          </div>

        </div>

        </div>
        <!-- Form -->
        <div class="py-5">
          <form class="d-flex flex-column gap-2" action="rent.php" method="POST">
            <div class="row">
              <div class="col">
                <div class="fs-5 mb-1 fw-medium">Username</div>
                <input type="text" name="username" class="form-control rounded" placeholder="Username" required>
              </div>
              <div class="col">
                <div class="fs-5 mb-1 fw-medium">Phone Number</div>
                <input type="tel" name="phone" class="form-control rounded" placeholder="Phone number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
                <div class="form-text text-light opacity-50">
                  Format: xxxx-xxxx-xxxx
                </div>
              </div>
            </div>
            <div class="mb-2">
              <div class="fs-5 mb-1 fw-medium">Address</div>
              <textarea name="address" class="form-control rounded" placeholder="Address" rows="2" cols="30" required></textarea>
            </div>
        

            <div class="col">
            <div class="mb-1 fs-5 fw-medium">Payment Method</div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" value="Cash">
                <label class="form-check-label">
                  Cash
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" value="Debit">
                <label class="form-check-label">
                  Debit/QRIS
                </label>
              </div>
              <p class="mt-3 fs-5 opacity-50">
                *Please double check your rent form. If the movie you’re booking is not what you mean, there are not the responsibilty of the Roovie, Inc.
              </p>
            </div>

            <div class="d-flex flex-row justify-content-between mt-3">
              <!-- button -->
              <a href="detail.php?movieId=<?= $result['MovieId']; ?>" class="btn btn-outline-success px-4 fs-4">Cancel</a>

              <input type="hidden" name="movieId" value="<?= $result['MovieId']; ?>">
              <input type="hidden" name="userId" value="<?= $_SESSION['userId']; ?>">
              <button type="submit" name="submit" class="btn btn-success px-4 fs-4">Submit</button>
            </div>
          </form>
        </div>

        <?php
          }
          if (isset($_POST['submit'])) {
            $movieId = $_POST['movieId'];
            $userId = $_POST['userId'];
            $username = $_POST['username'];
            $phoneNumber = $_POST['phone'];
            $address = $_POST['address'];
            $paymentMethod = $_POST['payment'];
          
            $action = $control->c_rent($userId, $movieId, $username, $address, $phoneNumber, $paymentMethod);

            if ($action == NULL) {
              echo "<script>alert('Rent Success!')</script>";
              echo "<script>window.location.href = 'index.php'</script>";
            } else {
              echo "<script>alert('Rent Failed!')</script>";
              echo "<script>window.location.href = 'index.php'</script>";
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>
