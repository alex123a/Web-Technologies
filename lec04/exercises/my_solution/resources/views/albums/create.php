<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo asset('js\home.js') ?>"></script>
        <title>Fill the album form</title>
    </head>

    <body>
        <form action="<?php echo route("albums.store") ?>"  method="POST">
            <?php echo csrf_field() ?>
            <div id="nameDiv">
                <label>Name:</label>
                <input id="nameID" type="text" name="name" placeholder="Bent">
                <span id="nameSpan"></span><br><br>
            </div>

            <div id="yearDiv">
                <label>Release year:</label>
                <input id="releaseID" type="number" name="release_date" placeholder="2003">
                <span id="releaseSpan"></span><br><br>
            </div>

            <div id="artistDiv">
                <label>Select artist:</label>
                <select name="artist" id="artist">
                    <?php foreach ($artists as $artist): ?>
                        <option value="<?php echo "".$artist["id"]; ?>"><?php echo "".$artist["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
                <span id="artistSpan"></span><br><br>
            </div>
            
            <div id="songtypeDiv">
                <label>Select song type:</label><br>
                <label>Single</label>
                <input type="radio" id="single" name="song_type" value="single"><br>
                <label>EP</label>
                <input type="radio" id="ep" name="song_type" value="ep"><br>
                <label>Album</label>
                <input type="radio" id="album" name="song_type" value="album"><br><br>
            </div>

            <label>Description:</label><br>
            <textarea id="description_text_area" name="description" rows="3" cols="60"></textarea><br><br>

            <label>Tracks</label><br>
            <div id="tracks">
                <div id="track1">
                    <input name="track[]">
                </div>
                <span id="tracksID"></span>
            </div>
            
            <!-- id is for identifying the button and type="submit" is for the -->
            <!-- form to know when to send the data -->
            
            <button id="addTrack" type="button">Add</button>
            <button id="submitBut" type="submit">Submit</button>
        </form>
    </body>
    
    
</html>