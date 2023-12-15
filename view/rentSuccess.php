<?php
session_start();

if(!isset($_SESSION['userId'])) {
  header("Location: login.php");
  die();
}

include_once "../controller/control.php";
$control = new Control();

if (isset($_POST['submit'])) {
  $movieId = $_POST['movieId'];
  $userId = $_POST['userId'];
  $username = $_POST['username'];
  $phoneNumber = $_POST['phone'];
  $address = $_POST['address'];
  $paymentMethod = $_POST['payment'];

  $action = $control->c_rent($userId, $movieId, $username, $address, $phoneNumber, $paymentMethod);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rent Success</title>
  </head>
  <body>
    <div>
      <div>
        <!-- icon here -->
      </div>

      <div>
        <h2>Your rent has been recorded</h2>
        <h6>
          Check your Profile -> Rent History to see your rent has been proceed
        </h6>
        <button>Go To Profile</button>
      </div>
    </div>
  </body>
</html>
