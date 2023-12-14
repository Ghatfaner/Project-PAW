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
  <title>Document</title>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../css/styles.css">
  <style>
    .container {
      max-width: 520px
    }
    .container .container-sm {
      background-color: #232D3F;
    }
    .submit-btn {
      border: none;
      background-color: #2B7761;
      color: #E6EFEC;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <form action="login.php" method="post">
    <div class="container mt-5 mb-5 rounded d-flex justify-content-center align-items-center">
      <div class="container-sm rounded shadow-lg px-5 py-5">
        <div class="d-flex justify-content-center align-items-center mb-5 gap-2">
          <i class="fa-solid fa-user-check fa-2xl"></i>
          <img src="../pictures/Logo-Light-Small.png" alt="" class="confirm-regist-img">
        </div>
        <div class="mb-5">
          <p class="d-flex justify-content-center text-center fs-4 fw-semibold">Register successful!</p>
          <p class="d-flex justify-content-center text-center px-5 fs-6">Your data has been registered.</br> Login by clicking the button below.</p>
        </div>
        
        <input type="submit" name="login" class="form-control rounded shadow-lg submit-btn py-3 fs-5" value="Login">
        
      </div>
    </div>
  </form>
</body>
</html>
