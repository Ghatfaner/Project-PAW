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
    
    <link rel="icon" href="../pictures/Logo-Light-Small.png" type="image/x-icon">
    <title>Edit Profile</title>

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
  include_once "../controller/control.php";
  $control = new control();

  if(isset($_POST['cancel'])){
    header('Location: profile.php');
  }

  if(isset($_POST['save'])){
    $userId = $_SESSION['userId'];
    $username = $_POST['Username'];
    $email = $_POST['Email'];
    $address = $_POST['Address'];
    $phoneNumber = $_POST['PhoneNumber'];
    $occupation = $_POST['Occupation'];

    $action = $control->c_updateProfile($userId, $username, $email, $address, $phoneNumber, $occupation);

    if($action == NULL){
      header('Location: profile.php');
    } else {
      echo "Failed to update profile";
    }
  }

  $action = $control->c_getProfile($_SESSION['userId']);
  foreach ($action as $result) {

?>

<div class="d-flex flex-column justify-content-center">
  <div class="container py-5">
    <div class="text-light d-flex flex-row justify-content-center">
      <h2>Edit Profile</h2>
    </div>
    <form class="row g-2 text-light" method="POST" action="editProfile.php">
      <div class="">
        <div class=" mx-5 mt-3">
          <label class="form-label">Username</label><br>
          <input type="text" class="form-control" name="Username" placeholder="<?php echo $result['Username'] ?>">
        </div>
        <div class=" mx-5 mt-3">
          <label class="form-label">Email</label><br>
          <input type="email" class="form-control" name="Email" placeholder="<?php echo $result['Email'] ?>">
        </div>
        <div class=" mx-5 mt-3">
          <label class="form-label">Address</label><br>
          <input type="text" class="form-control" name="Address" placeholder="<?php echo $result['Address'] ?>">
        </div>
        <div class=" mx-5 mt-3">
          <label class="form-label">Phone Number</label><br>
          <input type="text" class="form-control" name="PhoneNumber" placeholder="<?php echo $result['PhoneNumber'] ?>">
        </div>
        <div class=" mx-5 mt-3">
          <label class="form-label">Occupation</label><br>
          <input type="text" class="form-control" name="Occupation" placeholder="<?php echo $result['Occupation'] ?>">
        </div>
      </div>
    </form>
    <div class="d-flex flex-column justify-content-center px-5 mt-5 gap-3">
      <input type="submit" name="save" value="Save Changes" class="btn btn-success">
      <input type="submit" name="cancel" value="Exit" class="btn btn-outline-light">
    </div>
  </div>
</div>

<?php
  }
?>

</body>
</html>