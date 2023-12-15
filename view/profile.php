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
    <title>ROOVIE - My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <style>
          body {
          /* overflow-x: hidden; */
          background: #191F2C;
        }
        .navbar {
          background-color: #005B41;
        }
        .navbar-brand img {
          width: 100%;
        }

        .profile-pic-small{
          width: 200px;
          height: 200px;
          border-radius: 50%;
          object-fit: cover;
          
        }

        hr {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
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
    include_once "../controller/control.php";
    $control = new Control();
    $action = $control->c_getProfile($_SESSION['userId']);

    foreach ($action as $result) {
  ?>

  <div class="button float-end">
    <button type="button" class="btn btn-outline-light btn-sm mx-2" name="edit" id="edit">Edit profile</button>
    <button type="button" class="btn btn-outline-light btn-sm mx-2" id="signout">Sign Out</button>
  </div>

  <div>
    <img src="../pictures/profpic.jpeg" alt="Profile Picture" class="profile-pic-small">
  </div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">User Name</label>
    <input type="text" class="form-control" value="<?php echo $result['Username'] ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Occupation</label>
    <input type="text" class="form-control" value="<?php echo $result['Occupation'] ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" class="form-control" value="<?php echo $result['Email'] ?>" disabled>
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Phone Number</label>
    <input type="tel" class="form-control" value="<?php echo $result['PhoneNumber'] ?>" disabled>
  </div>
  <div class="col-6">
    <label for="inputAddress" class="form-label">Address</label>
    <input type="text" class="form-control" value="<?php echo $result['Address'] ?>" disabled>
  </div>

  <?php
    }
  ?>

<div class="rent">
  <div class="table">
    <div class="header text-light text-center mt-5 fw-bold fs-3">
      <h4>Rent History</h4>
      <hr />
    </div>
    <table class="table table-light w-75 p-3 mx-auto">
      <thead>
        <tr class="table-dark">
          <th scope="col">No</th>
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

        foreach($action as $result){
      ?>

      <tbody>
        <tr>
          <th></th>
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

<script type="text/javascript">
    document.getElementById("edit").onclick = function () {
        location.href = "editProfile.php";
    };

    document.getElementById("signout").onclick = function(){
      location.href = "login.php";
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