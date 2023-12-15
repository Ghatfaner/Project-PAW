<?php
session_start();

$servername = "localhost";
$database = "paw";
$username = "root";
$password = "";

// $conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksiit
//if (!$conn) {
//    die("Koneksi gagal: " . mysqli_connect_error());
//}
//mysqli_close($conn);

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>
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
        .navbar-nav .bookmark-link.active {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
        <img src="logo.png" alt="logo" class="logo" width="165px" height="48px">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 fw-bold ">
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="#">Adv. Search</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link" href="#">Category</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <a class="nav-link bookmark-link active" href="bookmark.php">Bookmark</a>
                    </li>
                    <li class="nav-item me-lg-5">
                        <i class="bi bi-person-fill" style="color: #FFFF;"></i>
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>




    <div class="Bookmark" style="align-self: stretch; height: 2032px; background:  #191F2C">
        <div class="BookmarkPage" style="align-self: stretch; height: 1892px; padding-bottom: 256px; left: 60px; top: 80px; position: absolute; background: #191F2C; flex-direction: column; justify-content: flex-start; align-items: center; gap: 48px; display: inline-flex">
            <div class="Navbar" style="align-self: stretch; padding-left: 72px; padding-right: 72px; padding-top: 1px; padding-bottom: 1px; background: #191F2C; justify-content: space-between; align-items: center; display: inline-flex">

            </div>
            <div class="Frame59" style="align-self: stretch; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                <?php foreach ($bookmarkedMovies as $index => $movie) : ?>
                    <div class="MovieCardSearch" style="width: 1344px; padding: 48px; background: #232D3F; border-radius: 12px; justify-content: flex-start; align-items: center; gap: 48px; display: inline-flex">
                        <div class="Frame50" style="flex: 1 1 0; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 32px; display: inline-flex">
                            <div class="Frame49" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: flex">
                                <div class="MovieTitle" style="color: #E6EFEC; font-size: 39px; font-weight: 600; line-height: 46.80px; word-wrap: break-word"><?php echo $movie['title']; ?></div>
                                <div class="Frame41" style="height: 96px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: flex">
                                    <div class="Frame35" style="align-self: stretch; justify-content: flex-start; align-items: flex-end; gap: 8px; display: inline-flex">
                                        <div class="Duration" style="color: #E6EFEC; font-size: 20px; font-weight: 600; line-height: 24px; word-wrap: break-word">Duration:</div>
                                        <div class="MovieDuration" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['duration']; ?></div>
                                    </div>
                                    <div class="Frame36" style="align-self: stretch; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
                                        <div class="ReleaseDate" style="color: #E6EFEC; font-size: 20px; font-weight: 600; line-height: 24px; word-wrap: break-word">Release Date:</div>
                                        <div class="MovieReleaseDate" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['release_date']; ?></div>
                                    </div>
                                    <div class="Frame37" style="align-self: stretch; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
                                        <div class="Genre" style="color: #E6EFEC; font-size: 20px; font-weight: 600; line-height: 24px; word-wrap: break-word">Genre:</div>
                                        <div class="MovieGenre" style="flex: 1 1 0; color: #E6EFEC; font-size: 20px; font-weight: 400; line-height: 24px; word-wrap: break-word"><?php echo $movie['genre']; ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="Frame52" style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: flex">
                                <div class="Frame58" style="justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex">
                                    
                                <div class="Button" type="Button" style="padding-left: 24px; padding-right: 24px; padding-top: 12px; padding-bottom: 12px; background: #E6EFEC; border-radius: 8px; justify-content: center; align-items: center; gap: 10px; display: flex">
                                        <div class="Button" style="color: #0F0F0F; font-size: 20px; font-family: Inter; font-weight: 700; line-height: 24px; word-wrap: break-word">More details</div>
                                    </div>
                                    <div class="AddButton" type="Button" style="padding: 10px; background: #E6EFEC; border-radius: 50px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                    <img src="bookmark.png" alt="bookmark" class="bookmark" width="35px" height="35px">    
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
