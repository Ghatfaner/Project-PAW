<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Form</title>
  </head>
  <body>
    <h2>Rent Movie DCP’s Form</h2>

    <form action="rent.php" method="POST">
      <div class="col">
        <div class="mb-1">Phone Number</div>
        <input type="number" name="phoneNumber" class="form-control rounded" placeholder="Phone Number" required>
      </div>
      <div class="col">
        <div class="mb-1">Password</div>
        <input type="password" name="password" class="form-control rounded" placeholder="Password" required>
      </div>
      <div class="col">
        <div class="mb-1">Payment Method</div>
        <input type="radio" name="paymentMethod" value="cash" class="form-control rounded" required>Cash <br>
        <input type="radio" name="paymentMethod" value="cashless" class="form-control rounded" required>Cashless (Debit/QRIS)
      </div>
    </form>

    <?php
    $movieId = intval($_GET['movieId']);
    include_once "../controller/control.php";
    $control = new Control();
    $action = $control->c_detailMovie($movieId);

    foreach ($action as $result) {
    ?>

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

    <p>
      *Please double check your rent form. If the movie you’re booking is not what you mean, there are not the responsibilty of the Roovie, Inc.
    </p>
    <div>
      <!-- button -->
      <div class="card-btn"><a href="detail.php?movieId=<?= $result['MovieId'] ?>" class="btn">Cancel</a></div>
      <div class="card-btn"><a href="rent.php?movieId=<?= $result['MovieId'] ?>" class="btn">Submit</a></div>
    </div>

    <?php
      }

      // tolong fan, logic buat ngambil nilai dari form diatas taroh di sini

      
    ?>
  </body>
</html>
