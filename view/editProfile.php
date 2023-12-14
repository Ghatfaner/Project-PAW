<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>ROOVIE - Edit Profilr</title>
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
      </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <img src="../pictures/logo-Light-Big.png" alt="logo" class="logo" width= "165px" height= "48px">
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



<div class="container mt-5 ">
<div class="profile-pic">
  <label class="-label" for="file">
  </label>
  <!-- <input id="file" type="file" onchange="loadFile(event)"/> -->
  <div class="d-flex justify-content-center">
    <img src="../pictures/regist-img-1.png" alt="Profile Picture" id="output" class="profile-pic-small" />
  </div>
</div>

<?php
require_once "../connDB.php";
require_once "../controller/control.php";
$sql = new control();
if(isset($_POST['save'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $occupation = $_POST['occupation'];

    $result=$sql->c_updateProfile($userId, $username, $email, $password, $address, $phoneNumber, $occupation);

}

?>
<form class="row g-2 text-light" method="post">
  <div class="col-lg-12">
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Username</label><br>
      <input type="text" class="form-control" id="username" placeholder="username" value="<?php echo $_SESSION['username']?>">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Email</label><br>
      <input type="text" class="form-control" id="email" placeholder="email">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Password</label><br>
      <input type="text" class="form-control" id="password" placeholder="password">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Address</label><br>
      <input type="text" class="form-control" id="address" placeholder="address">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Phone Number</label><br>
      <input type="text" class="form-control" id="phone" placeholder="phonenumber">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Occupation</label><br>
      <input type="text" class="form-control" id="occupation" placeholder="occupation">
    </div>
  </div>
    <button type="submit" class="btn btn-success mx-5 mt-5" name="save">Save Changes</button><br>
    <button type="button" class="btn btn-outline-light mx-5 mb-5" name="cancel">Cancel</button>
</form>
</div>

    
</body>
</html>