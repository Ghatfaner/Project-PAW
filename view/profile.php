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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/styles.css">

    <link rel="icon" href="../pictures/Logo-Light-Small.png" type="image/x-icon">
    <title>Profile</title>

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
        .footer {
          background-color: #005B41;
          color: #E6EFEC;
        }
        .profile img {
          width: 14rem;
          border-radius: 120px;
        }
        i {
          color: gold;
        }
        p {
          padding: 0 0;
          margin: 0 0;
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
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
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
          <li class="nav-item d-flex flex-row align-items-center bg-white rounded px-2 py-1">
            <i class="fas fa-user-circle fa-2x text-success"></i>
            <a class="nav-link active text-success" href="../view/profile.php">Profile</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="container py-5 d-flex flex-column">
    <?php
      include_once "../controller/control.php";
      $control = new Control();
      $action = $control->c_getProfile($_SESSION['userId']);
      foreach ($action as $result) {
    ?>

    <div class="d-flex flex-row justify-content-end">
      <button type="button" class="btn btn-outline-light btn-sm mx-2" name="edit" id="edit">Edit profile</button>
      <button type="button" class="btn btn-outline-light btn-sm mx-2" id="signout">Sign Out</button>
    </div>

    <div class="mb-5">
      <div class="d-flex flex-row align-items-center text-light text-start mt-5 fw-semibold fs-3 gap-2 mb-2">
        <i class="fas fa-circle-user fa-lg"></i>
        <div class="fs-2">Profile</div>
      </div>

      <div class="d-flex flex-row justify-content-start align-items-center gap-4 mb-5">
        
        <img src="../pictures/profpic.jpeg" alt="Profile Picture" class="profile rounded" style="height: 14rem;">

        <div class="d-flex flex-column gap-2">
          <div class="duration d-flex flex-row">
            <div class="d-flex flex-row align-items-center gap-2">
              <label class="fs-3 fw-bold">Name: </label>
              <p class="fs-3 fw-normal"><?php echo $result['Username'] ?></p>
            </div>
          </div>
          <div class="release-date d-flex flex-row">
            <div class="d-flex flex-row align-items-center gap-2">
              <label class="fs-3 fw-bold">Occupation: </label>
              <p class="fs-3 fw-normal"><?php echo $result['Occupation'] ?></p>
            </div>
          </div>
          <div class="age-rating d-flex flex-row">
            <div class="d-flex flex-row align-items-center gap-2">
              <label class="fs-3 fw-bold">Email: </label>
              <p class="fs-3 fw-normal"><?php echo $result['Email'] ?></p>
            </div>
          </div>
          <div class="age-rating d-flex flex-row">
            <div class="d-flex flex-row align-items-center gap-2">
              <label class="fs-3 fw-bold">Phone Number: </label>
              <p class="fs-3 fw-normal"><?php echo $result['PhoneNumber'] ?></p>
            </div>
          </div>
          <div class="actors d-flex flex-row">
            <div class="d-flex flex-row align-items-center gap-2">
              <label class="fs-3 fw-bold">Address: </label>
              <p class="fs-3 fw-normal"><?php echo $result['Address'] ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
      }
    ?>

  <div class="rent">
    <div class="d-flex flex-row align-items-center text-light text-start fs-3 gap-2 mb-3">
      <i class="fas fa-table fa-lg"></i>
      <div class="fs-2 fw-semibold">Rent Histories</div>
    </div>

    <div class="table shadow-lg fs-5">
      <table class="table table-light">
        <thead">
          <tr class="table-dark text-center">
            <th scope="col">Username</th>
            <th scope="col">Title</th>
            <th scope="col">Payment Method</th>
            <th scope="col">Price</th>
            <th scope="col">Rent Date</th>
            <th scope="col">Return date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <?php
          $action = $control->c_getRentHistory($_SESSION['userId']);
          foreach ($action as $result) {
        ?>
        <tbody>
          <tr class="text-center">
              <td><?php echo $result['username'] ?></td>
              <td><?php echo $result['title'] ?></td>
              <td><?php echo $result['paymentmethod'] ?></td>
              <td><?php echo $result['price'] ?></td>
              <td><?php echo $result['rentdate'] ?></td>
              <td><?php echo $result['returndate'] ?></td>
              <td><?php echo $result['status'] ?></td>
          </tr>
        </tbody>
        <?php
          
          }
        ?>
      </table>
      </div>
    </div>
  </div>

<script type="text/javascript">
    document.getElementById("edit").onclick = function () {
        location.href = "editProfile.php";
    };

    document.getElementById("signout").onclick = function(){
      location.href = "../controller/logout.php";
    }
</script>

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

</body>
</html>