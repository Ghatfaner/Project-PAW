<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="../css/styles.css">

  <title>Registration</title>
</head>
<body>
  <div class="regist-form-img">
    <div class="container">
      <h2 class="form-title">Registration</h2>
      <form action="registration.php" method="post">
        <div class="form-group">
          <div class="form-label">Username</div>
          <input type="text" name="username" class="form-control" placeholder="Write your username" required>
        </div>
        <div class="form-group">
          <div class="form-label">Email</div>
          <input type="email" name="email" class="form-control" placeholder="Write your email" required>
        </div>
        <div class="form-group">
          <div class="form-label">Phone Number</div>
          <input type="tel" name="phone" class="form-control" placeholder="Write your phone number" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}" required>
        </div>
        <div class="form-group">
          <div class="form-label">Address</div>
          <textarea name="address" class="form-control-textarea" placeholder="Write your address" rows="4" cols="30" required></textarea>
        </div>
        <div class="form-group">
          <div class="form-label">Password</div>
          <input type="password" name="password" class="form-control" placeholder="Write your password" required>
        </div>
        <div class="form-group">
          <div class="form-label">Confirmation Password</div>
          <input type="password" name="password" class="form-control" placeholder="Write your password again" required>
        </div>
        <div class="form-group-button">
          <input type="submit" name="submit" class="regist-button" value="Register">
        </div>
      </form>
    </div>
    <div>
      <img src="../pictures/regist-page.jpg" alt="registration" class="img-regist">
    </div>
  </div>
</body>
</html>
