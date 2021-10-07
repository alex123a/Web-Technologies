<html>
    <head>
        <!-- <link rel = "stylesheet" type = "text/css" href = "css\style.css" /> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
        <!-- <script src="home.js"></script> -->
        <title>Home</title>
    </head>

    <body>
        <div>
            <h1>Home for albums!</h1><br>
            <a href="<?php echo route("albums.create") ?>">Add Album</a>
            <div>
                <h2>Number of albums created</h2>
                <p><?php echo $numberOfAlbums ?> </p>
                <h2>Below you see your newly created album</h2>
                <?php foreach ($albums as $album) {
                    echo "<p>Album name: ".$album["name"]."</p>";
                    echo "<p>Artist name: ".$album["artist"]. "</p>";
                    echo "<p>Release year: ".$album["year"]."</p>";
                    echo "<p>Type: ".$album["type"]."</p>";
                    echo "<p>Description: ".$album["description"]."</p>";
                    echo "<p>Tracks</p>";
                    foreach ($album["tracks"] as $track) {
                        echo "<p>".$track."</p>";
                    }
                    echo "<br>";
                }
                ?>
            </div>
        </div>
    </body>
</html>