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
    <style>
        /* Tambahkan styling sesuai kebutuhan */
    </style>
</head>

<body>
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
