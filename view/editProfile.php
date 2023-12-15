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
  include_once "../controller/control.php";
  $control = new control();

  if(isset($_POST['save'])){
    $userId = $_SESSION['userId'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $phone = $_POST['PhoneNumber'];
    $occupation = $_POST['Occupation'];

    $action = $control->c_updateProfile($userId, $username, $email, $address, $phoneNumber, $occupation);
  }

  if(isset($_POST['cancel'])){
    header('Location: profile.php');
  }

  $action = $control->c_getProfile($_SESSION['userId']);
  foreach ($action as $result) {

?>
<form class="row g-2 text-light" method="POST" action="editProfile.php">
  <div class="col-lg-12">
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">User Name</label><br>
      <input type="text" class="form-control" name="Username" placeholder="<?php echo $result['Username'] ?>">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Email</label><br>
      <input type="email" class="form-control" name="Email" placeholder="<?php echo $result['Email'] ?>">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Address</label><br>
      <input type="text" class="form-control" name="Address" placeholder="<?php echo $result['Address'] ?>">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Phone Number</label><br>
      <input type="number" class="form-control" name="PhoneNumber" placeholder="<?php echo $result['PhoneNumber'] ?>">
    </div>
    <div class="col-12 mx-5 mt-3">
      <label for="inputAddress" class="form-label">Occupation</label><br>
      <input type="text" class="form-control" name="Occupation" placeholder="<?php echo $result['Occupation'] ?>">
    </div>
  </div>
    <button type="submit" class="btn btn-success mx-5 mt-5" name="save">Save Changes</button><br>
    <button type="button" class="btn btn-outline-light mx-5 mb-5" name="cancel">Cancel</button>
</form>

<?php
  }
?>
<!-- 
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
     -->
</body>
</html>