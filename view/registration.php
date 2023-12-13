<?php
session_start();
if (isset($_SESSION['userId'])) {
  header("Location: index.php");
  die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/styles.css">

  <title>Registration</title>
  <style>
    .container {
      width: 50%;
    }
    .h3 {
      font-weight: 500;
    }
    .form-label {
      margin-bottom: 4px
    }
    .container {
      background-color: #232D3F;
      padding: 36px 36px;
    }
    .submit-btn {
      border: none;
      padding: 12px 12px;
      background-color: #FDB827;
      color: #232D3F;
      font-weight: 600;
    }
  </style>
</head>
<body>
    <div class="container mt-5 mb-5 rounded">
      <h3 class="mb-3 d-flex justify-content-center">Sign-up</h3>
      <div class="d-flex justify-content-center">
        <img src="../pictures/Logo-Light-Big.png" alt="registration" class="mb-5">
      </div>
      <?php
      if (isset($_POST['submit'])) {
        $username = isset($_POST['username']) ? $_POST['username'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
        
        // Check if the "occupation" key exists before accessing it
        $occupation = isset($_POST['occupation']) ? $_POST['occupation'] : '';
        
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';
        $passwordConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';

        $errors = array();

        if (strlen($password) < 8) {
            array_push($errors, "The password must be at least 8 characters");
        }
        if ($password !== $passwordConfirm) {
            array_push($errors, "The passwords do not match");
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<div class='alert alert-danger' role='alert'>$error</div>";
            }
        } else {
            require_once "../connDB.php"; // Check the path here
            require_once "../controller/control.php"; // Check the path here
            $sql = new control(); // Make sure control class is defined
            $result = $sql->c_signUp($username, $email, $password, $address, 
            $phone, $occupation);
            if ($result == 'success') {
                echo "<div class='alert alert-success' role='alert'>Registration success. You can login <a style=\"color: green;\" href=\"../view/login.php\">here.</a></div>";
            } else {
                echo "<div class='alert alert-danger' role='alert'>Registration failed, email already exist.</div>";
            }
        }
      }
      ?>
      <form action="registration.php" method="post">
        <div class="row mb-2">
          <div class="col">
            <div class="form-label">Username</div>
            <input type="text" name="username" class="form-control rounded" placeholder="Username" required>
          </div>
          <div class="col">
            <div class="form-label">Email</div>
            <input type="email" name="email" class="form-control rounded" placeholder="Email" required>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <div class="form-label">Phone Number</div>
            <input type="tel" name="phone" class="form-control rounded" placeholder="Phone number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
          </div>
          <div class="col">
            <div class="form-label">Occupation</div>
            <input type="text" name="occupation" class="form-control rounded" placeholder="Occupation" required>
          </div>
        </div>
        <div class="mb-2">
          <div class="form-label">Address</div>
          <textarea name="address" class="form-control rounded" placeholder="Address" rows="2" cols="30" required></textarea>
        </div>
        <div class="mb-2">
          <div class="form-label">Password</div>
          <input type="password" name="password" class="form-control rounded" placeholder="Password" required>
        </div>
        <div class="mb-5">
          <div class="form-label">Confirmation Password</div>
          <input type="password" name="passwordConfirm" class="form-control rounded" placeholder="Confirm password" required>
        </div>
        <div>
          <input type="submit" name="submit" class="form-control rounded submit-btn" value="Sign-up">
        </div>
      </form>
    </div>
</body>
</html>
