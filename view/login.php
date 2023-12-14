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
  
  <style>
    .container {
      max-width: 50%;
      background-color: #232D3F;
      padding: 36px 36px;
    }
    .h3 {
      font-weight: 500;
    }
    .form-label {
      margin-bottom: 4px
    }
    .submit-btn {
      border: none;
      background-color: #2B7761;
      color: #E6EFEC;
      font-weight: 600;
    }
  </style>
  
  <title>Login</title>
</head>
<body>
    <div class="container mt-5 mb-5 rounded">
      <p class="mb-5 d-flex justify-content-center fs-3 fw-semibold">Login</p>
      <div class="d-flex justify-content-center">
        <img src="../pictures/Logo-Light-Big.png" alt="registration" class="mb-5">
      </div>
      <?php
        if (isset($_POST['login'])) {
          $email = isset($_POST['email']) ? $_POST['email'] : '';
          $password = isset($_POST['password']) ? $_POST['password'] : '';

          require_once "../connDB.php"; // Check the path here
          require_once "../controller/control.php"; // Check the path here
          $sql = new control(); // Make sure control class is defined
          $result = $sql->c_signIn($email, $password);

          if ($result == 'failed') {
            echo "<div class='alert alert-danger' role='alert'>Sign in failed. Check your email or password.</div>";
          } else {
            session_start();
            $_SESSION['userId'] = $result;
            header("Location: index.php");
            die();
          }
        }
      ?>
      <form action="login.php" method="post">
        <div class="mb-2">
          <div class="form-label">Email</div>
          <input type="email" name="email" class="form-control rounded" placeholder="Email" required>
        </div>
        <div class="mb-5">
          <div class="form-label">Password</div>
          <input type="password" name="password" class="form-control rounded" placeholder="Password" required>
        </div>

        <input type="submit" name="login" class="form-control rounded submit-btn py-3 fs-5" value="Login">
        
      </form>
    </div>
</body>
</html>
