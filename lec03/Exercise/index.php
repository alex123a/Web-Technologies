<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href = "css\style.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="home.js"></script>
        <title>Home</title>
    </head>

    <body>
        <div>
            <h1>Home for albums!</h1><br>
            <a href="write_a_form.php">Add Album</a>
            <div>
                <h2>Below you see your newly created album</h2>
                <form method="POST">
                    <label>Name: <?php echo $_POST["name"] ?></label><br>
                    <label>Release year: <?php echo $_POST["release_date"] ?></label><br>
                    <label>Artist: <?php echo $_POST["artist"] ?></label><br>
                    <label>Song type: <?php echo $_POST["song_type"] ?></label><br>
                    <label>Description:</label>
                    <p id="description"><?php echo $_POST["description"] ?></p><br>
                    <label># Tracks: <?php echo count($_POST['track']);?></label>
                </form>
            </div>
        </div>
    </body>
</html>