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

  <title>Sign In</title>
</head>
<body>
    <div class="container rounded d-flex justify-content-between">
      <div class="container-form">
        <h2 class="form-title mb-4">Login</h2>
        <?php
          if (isset($_POST['login'])) {
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            require_once "../connDB.php"; // Check the path here
            require_once "../controller/control.php"; // Check the path here
            $sql = new control(); // Make sure control class is defined
            $result = $sql->c_signIn($email, $password);

            if ($result == 'failed') {
              echo "<div class='alert alert-danger' role='alert'>Sign in failed</div>";
            } else {
              session_start();
              $_SESSION['userId'] = $result;
              header("Location: index.php");
              die();
            }
          }
        ?>
        <form action="login.php" method="post">
          
          <div class="form-group">
            <div class="form-label">Email</div>
            <input type="email" name="email" class="form-control rounded" placeholder="Write your email" required>
          </div>
          <div class="form-group">
            <div class="form-label">Password</div>
            <input type="password" name="password" class="form-control rounded" placeholder="Write your password" required>
          </div>
          <div class="submit-button mt-5">
            <input type="submit" name="login" class="btn btn-light btn-block" value="Sign in">
          </div>
        </form>
      </div>
      <div class="container-img">
        <img src="../pictures/regist-img.png" alt="registration" class="img-fluid mt-5">
      </div>
    </div>
</body>
</html>
