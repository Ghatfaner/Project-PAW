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
    <title>ROOVIE - My Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">

    <style>
          body {
          /* overflow-x: hidden; */
          background: #191F2C;
        }
        .navbar {
          background-color: #005B41;
        }
        .navbar-brand img {
          width: 100%;
        }

        .profile-pic-small{
          width: 200px;
          height: 200px;
          border-radius: 50%;
          object-fit: cover;
          
        }

        hr {
        width: 80%;
        margin-left: auto;
        margin-right: auto;
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
            <a class="nav-link active text-white mx-2" aria-current="page" href="../view/index.php">Home</a>
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

<div class="container mt-4 ">
  <div class="row ">
      <div class="absolute-container text-light">
        <div class="button float-end">
          <button type="button" class="btn btn-outline-light btn-sm mx-2" name="edit" id="edit">Edit profile</button>
          <button type="button" class="btn btn-outline-light btn-sm mx-2" id="signout">Sign Out</button>
        </div>
        <div class="d-flex justify-content-center mx-5 mt-5">
          <img src="../pictures/profpic.jpeg" alt="Profile Picture" class="profile-pic-small">
        </div>
        <div class="bio">

          <?php
          require_once "../connDB.php";
          require_once "../controller/control.php";

          
          ?>
          <h3 class="text-center"><?php echo $_SESSION['username']; ?></h3>
          <p class="text-center"><?php echo $_SESSION['address'];?>     |     <?php echo $_SESSION['occupation']; ?></p>
        </div> 
      </div>
  </div>
</div>
<div class="rent">
  <div class="table">
    <div class="header text-light text-center mt-5 fw-bold fs-3">
      <p>Rent History</p>
      <hr />
    </div>
    <table class="table table-light w-75 p-3 mx-auto">
      <thead>
        <tr class="table-dark">
          <th scope="col">No</th>
          <th scope="col">Username</th>
          <th scope="col">Title</th>
          <th scope="col">Payment Method</th>
          <th scope="col">Price</th>
          <th scope="col">Rent Date</th>
          <th scope="col">Return date</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require_once "../connDB.php";
        require_once "../controller/control.php";
        $control = new Control();

        $sql = $control->c_getRentHistory();

        $result = $sql->fetch_assoc();

        foreach($result as $rslt){
            ?>

          <tr>
          <th ><?php echo $rslt['rentId']?></th>
          <td><?php echo $rslt['username'] ?></td>
          <td><?php echo $rslt['title'] ?></td>
          <td><?php echo $rslt['paymentmethod'] ?></td>
          <td><?php echo $rslt['price'] ?></td>
          <td><?php echo $rslt['rentdate'] ?></td>
          <td><?php echo $rslt['returndate'] ?></td>
          <td><?php echo $rslt['status'] ?></td>
        </tr>
         
         <?php
          }
        ?>



        <!-- <tr>
          <th >1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th >2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
          <td>@fat</td>
          <td>@fat</td>
          <td>@fat</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr>
        <tr>
          <th >3</th>
          <td >Larry the Bird</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
          <td>@twitter</td>
        </tr> -->
      </tbody>
    </table>
  </div>

</div>

<!-- <div class="footer"  style="background-color: #005B41;">
    <div class="container-fluid px-5 py-5 d-flex flex-column">
      <div class="pb-5">
        <img src="../pictures/Logo-Light-Small.png" alt="">
      </div>
      <div class="row">
        <div class="col-3">
          <h5 class="mb-3">Home</h5>
          <p>Discover a variety of exciting content and explore the latest updates.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Search</h5>
          <p>See relevant information quickly and easily using our powerful search feature.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Category</h5>
          <p>Explore a wide range of categories and find content tailored to your interests.</p>
        </div>
        <div class="col-3">
          <h5 class="mb-3">Social Media</h5>
          <p>Connect with us on social media for the latest updates and engaging content.</p>
          <div class="text-light d-flex flex-row justify-content-start gap-2">
            <div>
              <i class="fab fa-facebook-square fa-2x"></i>
            </div>
            <div>
              <i class="fab fa-whatsapp-square fa-2x"></i>
            </div>
            <div>
              <i class="fab fa-twitter-square fa-2x"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
</div> -->


<script type="text/javascript">
    document.getElementById("edit").onclick = function () {
        location.href = "editProfile.php";
    };

    document.getElementById("signout").onclick = function(){
      location.href = "login.php";
    }
</script>



</body>
</html>
