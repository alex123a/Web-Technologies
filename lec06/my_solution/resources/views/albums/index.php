<html>
    <head>
        <!-- <link rel = "stylesheet" type = "text/css" href = "css\style.css" /> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- <script src="home.js"></script> -->
        <title>Home</title>
        <script>
            $( document ).ready(function() {
                var albums_start = 0;
                function getAlbumsController() {
                    $.ajax({
                        url: "<?php echo route("albums.getAlbums") ?>",
                        async: false,
                        success: function(data) {
                            $("#numberOfAlbumsDiv").empty();
                            $("#albumsDiv").empty();

                            let albumsNumberHeader = "<h2>Number of albums created in this session:</h2>";
                            let numberOfAlbums = data[1];

                            albums_start = numberOfAlbums;

                            $("#numberOfAlbumsDiv").append(albumsNumberHeader);
                            $("#numberOfAlbumsDiv").append(numberOfAlbums);

                            let albumsHeader = "<h2>List of albums:</h2>"
                            $("#albumsDiv").append(albumsHeader);
                            for (i = 0; i < data[0].length; i++) {
                                let album = data[0];
                                let div = "<div id=\"" + i + "\"></div>";
                                $("#albumsDiv").append(div);
                                let name = "<p>Album name: " + album[i]["name"] + "</p>";
                                let artistName = "<p>Artist name: " + album[i]["artist"] + "</p>";
                                let releaseYear = "<p>Release year: " + album[i]["year"] + "</p>";
                                let type = "<p>Type: " + album[i]["type"] + "</p>";
                                let description = "<p>Description: " + album[i]["description"] + "</p>";
                                let tracksHeader = "<p><b>Tracks in album:</b></p>";
                                $("#" + i).append(name);
                                $("#" + i).append(artistName);
                                $("#" + i).append(releaseYear);
                                $("#" + i).append(type);
                                $("#" + i).append(description);
                                $("#" + i).append(tracksHeader);
                                album[i]["tracks"].forEach(function(trackElement) {
                                    let track = "<p>" + trackElement + "</p>";
                                    $("#" + i).append(track);
                                });
                                let deleteBut = "<button id=\"" + i + "\">Delete album</button><br><br>";
                                $("#" + i).append(deleteBut);
                            }
                        },
                        always: function() {
                            // This part doesn't work since the code under should be out from the Ajax.
                            setTimeout(function() { 
                                getAlbumsController(); 
                            }, 800);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                    // getAlbumsController();
                }
                getAlbumsController();

                function deleteButAjax(id) {
                    $.ajax({
                        url: "albums/deleteAlbum/" + id,
                        success: function() { 
                            getAlbumsController();
                        }
                    });
                }

                function alertMessage() {
                    console.log("fuck");
                    $.ajax({
                        url: "albums/numOfNewAlbums/" + albums_start,
                        async: false,
                        success: function(data) { 
                            if (data[0] > 0) {
                                alert("Number of new albums: " + data[0]);
                            }
                        }
                    });
                    setTimeout(function() { 
                        alertMessage(); 
                    }, 5000);
                }
                alertMessage();

                $("#albumsDiv").on("click", "button", function() {
                    let parentId = $(this).parent().attr("id");

                    $("#" + parentId).remove();
                });
            });
        </script>
    </head>

    <body>
        <div>
            <form method="POST" action="<?php

use SebastianBergmann\Environment\Console;

echo route("logout") ?>">
                <?php echo csrf_field() ?>
                <button type="submit">Logout</button>
            </form>
        </div>
        <div>
            <h1>Home for albums!</h1><br>
            <a href="<?php echo route("albums.create") ?>">Add Album</a><br><br>
            </div>
            <div id="numberOfAlbumsDiv">

            </div>
            <div id="albumsDiv">

            </div>
        </div>
    </body>
</html>
