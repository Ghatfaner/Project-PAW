<?php
session_start();

if (isset($_SESSION['edit'])) {
  header("Location: editProfile.php");
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
    <style>
      body{
        background-color: #191F2C;
      }

      .navbar-expand-lg{
        background-color: #005B41;
        color: white;
      }

      .nav-item {
            display: inline-flex;
            align-items: center;
        }
        .nav-item i {
          font-size: 24px; 
        }

        .profile-pic-small{
          position: relative;
          width: 200px;
          height: 200px;
          border-radius: 50%;
          object-fit: cover;
          
        }

        .absolute-container{
          /* position: relative; */
          height: 300px;
        }

        .absolute-container img{
          /* position: relative; */
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
        }

        .bio{
          /* position: relative; */
          margin-top: 100px;
        }

        .container{
          /* position: relative; */
        }

        .line{
          margin-top: 50px;
          height: 1px; /* Set the line height */
          border-bottom: 1px solid white; /* Set the line style and color */
        }

        .content-table{
          
        }

    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <img src="../pictures/Logo-Light-Big.png" alt="logo" class="logo" width= "165px" height= "48px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 fw-bold ">
        <li class="nav-item me-lg-5 ">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Adv. Search</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Category</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Bookmark</a>
        </li>
        <li class="nav-item me-lg-5 bg-light rounded px-2">
          <i class="bi bi-person-fill" style="color: #005B41;"></i>
          <a class="nav-link active" aria-current="page" style="color: #005B41;" href="profile.php">Profile</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4 ">
  <div class="row ">
      <div class="absolute-container text-light">
        <div class="button float-end">
          <button type="button" class="btn btn-outline-light btn-sm mx-2" href="editProfile.php" name="edit">Edit profile</button>
          <button type="button" class="btn btn-outline-light btn-sm mx-2" href="../controllers.logout.php">Sign Out</button>
        </div>
        <img src="../pictures/regist-img-1.png" alt="Profile Picture" class="profile-pic-small">
        <div class="option d-flex justify-content-end ">
        </div>
        <div class="bio">

          <?php
          require_once "../connDB.php";
          require_once "../controller/control.php";

          if(isset($_POST['edit'])){
            include_once("editProfile.php");
          }
          ?>
          <h3 class="text-center"><?php echo $_POST['username']; ?></h3>
          <p class="text-center"><?php echo $_POST['address'];?>     |     <?php echo $_POST['occupation']; ?></p>
        </div> 
      </div>
  </div>
</div>

<!-- <div class="content-table">
  <div class="row justify-content-md-center">
    <table class="table table-dark w-75">
      <tr class="table-info">
        <td class="table-dark">No</td>
        <td class="table-dark">Movie Title</td>
        <td class="table-dark">Synopsis</td>
        <td class="table-dark">Age Rating</td>
        <td class="table-dark">Stock</td>
        <td class="table-dark">Price</td>
      </tr>

    </table>
  </div>
</div> -->

</body>
</html>

