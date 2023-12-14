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

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/styles.css">

  <link rel="icon" href="../pictures/Logo-Light-Small.png" type="image/x-icon">
  <title>Registration</title>
  
  <style>
    .container {
      max-width: 50%;
    }
    .h3 {
      font-weight: 500;
    }
    .mb-1 {
      margin-bottom: 4px
    }
    .container {
      background-color: #232D3F;
      padding: 36px 36px;
    }
    .submit-btn {
      border: none;
      background-color: #2B7761;
      color: #E6EFEC;
      font-weight: 600;
    }
    .form-text {
      font-size: 12px;
      color: #E6EFEC;
      opacity: 0.5;
    }
    .form-text a {
      color: #2B7761;
    }
  </style>
</head>
<body>
    <div class="container mt-5 mb-5 rounded">
      <p class="mb-5 d-flex justify-content-center fs-3 fw-semibold">Sign-up</p>
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
                    header("Location: confirmRegist.php");
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Registration failed, email already exist.</div>";
                }
            }
        }
      ?>
      <form action="registration.php" method="post">
        <div class="row mb-2">
          <div class="col">
            <div class="mb-1">Username</div>
            <input type="text" name="username" class="form-control rounded" placeholder="Username" required>
          </div>
          <div class="col">
            <div class="mb-1">Email</div>
            <input type="email" name="email" class="form-control rounded" placeholder="Email" required>
          </div>
        </div>
        <div class="row mb-2">
          <div class="col">
            <div class="mb-1">Phone Number</div>
            <input type="tel" name="phone" class="form-control rounded" placeholder="Phone number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
            <div class="form-text">
              Format: xxxx-xxxx-xxxx
            </div>
          </div>
          <div class="col">
            <div class="mb-1">Occupation</div>
            <input type="text" name="occupation" class="form-control rounded" placeholder="Occupation" required>
          </div>
        </div>
        <div class="mb-2">
          <div class="mb-1">Address</div>
          <textarea name="address" class="form-control rounded" placeholder="Address" rows="2" cols="30" required></textarea>
        </div>
        <div class="mb-2">
          <div class="mb-1">Password</div>
          <input type="password" name="password" class="form-control rounded" placeholder="Password" required>
          <div class="form-text">
            Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
          </div>
        </div>
        <div class="mb-5">
          <div class="mb-1">Confirmation Password</div>
          <input type="password" name="passwordConfirm" class="form-control rounded" placeholder="Confirm password" required>
        </div>
        
        <input type="submit" name="submit" class="form-control rounded submit-btn py-3 fs-5" value="Sign-up">
        <div class="form-text mt-4 fs-5 text-center">
          Already have an account? <a href="login.php" class="text-decoration-none">Login</a>
        </div>
        
      </form>
    </div>
</body>
</html>
