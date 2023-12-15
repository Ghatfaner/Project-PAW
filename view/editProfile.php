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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid px-4">

      <a class="navbar-brand" href="../view/index.php">
        <img src="../pictures/Logo-Light-Small.png" alt="">
      </a>

      <div class="d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-white mx-2" aria-current="page" href="../view/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50 mx-2" href="../view/search.php">Search</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50 mx-2" href="../view/category.php">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white-50 mx-2" href="../view/bookmark.php">Bookmark</a>
          </li>
          <li class="nav-item me-lg-5 bg-light rounded px-1 d-flex">
          <i class="bi bi-person-fill mt-2" style="color: #005B41;"></i>
          <a class="nav-link active fw-bold mx-2" aria-current="page" style="color: #005B41;" href="profile.php">Profile</a>
        </li>
        </ul>
      </div>
    </div>
</nav>

<?php
if(isset($_FILES['image'])) {
  $errors = [];
  $filename = $_FILES['image']['name'];
  $filesize = $_FILES['image']['size'];
  $filetmp = $_FILES['image']['tmpname'];
  $filetype = $_FILES['image']['type'];
  $fileext = strtolower(end(explode('.', $_FILES['image']['name'])));

  $extensions = ['jpeg', 'jpg', 'png'];

  if(in_array($fileext, $extensions) === false){
    $errors[] = "please choose a jpeg, jpg or png files";
  }

  if (empty($errors) == true) {
    move_uploaded_file($file_tmp, "images/".$file_name);
    echo "Success!";
 } else {
    print_r($errors);
}
}
?>

<div class="container mt-5 ">
<div class="profile-pic">
  <label class="-label" for="file">
  </label>
  <!-- <input id="file" type="file" onchange="loadFile(event)"/> -->
  <div class="d-flex justify-content-center">
    <img src="../pictures/profpic.jpeg" alt="Profile Picture" id="output" class="profile-pic-small" />
  </div>
  <div class="d-flex justify-content-center mt-3">
    <form enctype="multipart/form-data">
      <div class="form-group">
        <label for="image">Choose image</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
      </div>
      <button type="button" class="btn btn-outline-light mt-3" id="upload">Upload</button>
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
    $hasil= $result->c_getProfile($userId);

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
    <button type="submit" class="btn btn-success mx-5 mt-5" name="save" id="save">Save Changes</button><br>
    <button type="button" class="btn btn-outline-light mx-5 mb-5" name="cancel" id="cancel">Cancel</button>
</form>
</div>

<script src="../js/jquery-3.7.1.min.js">
    $('#upload').on('click', function(){
      let formData = new formData();
      let file = $('#image'[0].files[0]);
      formData.append('image', file);

      $.ajax({
        url: 'editProfile.php',
        type: 'post',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response){
          console.log(response);
        },
        error: function(response){
          console.log(response);
        }
      })
    });

    $('#cancel').on('click', function(){
      window.location = 'profile.php';
    });

</script>
    
</body>
</html>