<?php
session_start();

$bookmarkedMovies = array(
    array(
        "title" => "Spider-Man: Into The Spider-Verse",
        "duration" => "120 minutes",
        "release_date" => "2018",
        "genre" => "Action"
    ),
    array(
        "title" => "Avatar",
        "duration" => "150 minutes",
        "release_date" => "2009",
        "genre" => "Adventure"
    ),
    array(
        "title" => "The Dark Knight",
        "duration" => "152 minutes",
        "release_date" => "2008",
        "genre" => "Action"
    ),
    array(
        "title" => "Titanic",
        "duration" => "195 minutes",
        "release_date" => "1997",
        "genre" => "Romance"
    )
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ROOVIE - Bookmarks</title>
    <!-- Tambahkan link stylesheet atau style internal sesuai kebutuhan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
        /* Tambahkan styling sesuai kebutuhan */
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
    </style>
</head>

<body>
<!-- <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <img src="../pictures/Logo-Light-Big.png" alt="logo" class="logo" width="165px" height="48px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 fw-bold ">
                    <li class="nav-item me-lg-5 ">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Adv. Search</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Category</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link active" aria-current="page" href="#">Bookmark</a>
                    </li>
                    <li class="nav-item me-lg-5 bg-light rounded px-2">
                        <i class="bi bi-person-fill" style="color: #005B41;"></i>
                        <a class="nav-link active" aria-current="page" style="color: #005B41;" href="profile.php">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> -->

    <nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container-fluid">
    <img src="../pictures/Logo-Light-Big.png" alt="logo" class="logo" width= "165px" height= "48px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 fw-bold ">
        <li class="nav-item me-lg-5 ">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Adv. Search</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Category</a>
        </li>
        <li class="nav-item me-lg-5">
          <a class="nav-link active" aria-current="page" href="#">Bookmark</a>
        </li>
        <li class="nav-item me-lg-5 bg-light rounded px-2">
          <i class="bi bi-person-fill" style="color: #005B41;"></i>
          <a class="nav-link active" aria-current="page" style="color: #005B41;" href="profile.php">Profile</a>
        </li> 
      </ul>
    </div>
  </div>
</nav>


    <div class="Bookmark" style="width: 1548px; height: 2032px; background: #404040">
        <div class="BookmarkPage" style="width: 1440px; height: 1892px; padding-bottom: 256px; left: 60px; top: 96px; position: absolute; background: #191F2C; flex-direction: column; justify-content: flex-start; align-items: center; gap: 48px; display: inline-flex">
            <div class="Navbar" style="align-self: stretch; padding-left: 72px; padding-right: 72px; padding-top: 32px; padding-bottom: 32px; background: #005B41; justify-content: space-between; align-items: center; display: inline-flex">
                <!-- Navbar Content (Sesuaikan dengan kebutuhan) -->
            </div>
            <div class="Frame59" style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                <!-- Loop through bookmarked movies -->
                <?php foreach ($bookmarkedMovies as $index => $movie) : ?>
                    <div class="MovieCardSearch" style="width: 1344px; padding: 48px; background: #232D3F; border-radius: 12px; justify-content: flex-start; align-items: center; gap: 48px; display: inline-flex">
                        <div class="Frame50" style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 32px; display: inline-flex">
                            <div class="Frame49" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: flex">
                                <div class="MovieTitle" style="color: #E6EFEC; font-size: 39px; font-family: Inter; font-weight: 600; line-height: 46.80px; word-wrap: break-word"><?php echo $movie['title']; ?></div>
                                <div class="Frame41" style="height: 96px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: flex">
                                    <div class="Frame35" style="align-self: stretch; justify-content: flex-start; align-items: flex-end; gap: 8px; display: inline-flex">
                                        <div class="Duration" style="color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">Duration:</div>
                                        <div class="MovieDuration" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['duration']; ?></div>
                                    </div>
                                    <div class="Frame36" style="align-self: stretch; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
                                        <div class="ReleaseDate" style="color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">Release Date:</div>
                                        <div class="MovieReleaseDate" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['release_date']; ?></div>
                                    </div>
                                    <div class="Frame37" style="align-self: stretch; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
                                        <div class="Genre" style="color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 600; line-height: 24px; word-wrap: break-word">Genre:</div>
                                        <div class="MovieGenre" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-family: Inter; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['genre']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="Frame52" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: flex">
                                <div class="Frame58" style="justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
                                    <div class="Button" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; background: #E6EFEC; border-radius: 8px; justify-content: center; align-items: center; gap: 10px; display: flex">
                                        <div class="Button" style="color: #0F0F0F; font-size: 20px; font-family: Inter; font-weight: 700; line-height: 24px; word-wrap: break-word">More details</div>
                                    </div>
                                    <div class="AddButton" style="padding: 10px; background: #E6EFEC; border-radius: 50px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                        <img class="Bookmark" style="width: 36px; height: 36px" src="https://via.placeholder.com/36x36" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</body>

</html>
