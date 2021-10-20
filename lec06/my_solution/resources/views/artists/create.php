<html>
    <head>
        <link rel = "stylesheet" type = "text/css" href="<?php echo asset('css\main.css') ?>" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="<?php echo asset('js\home.js') ?>"></script>
        <title>Fill the album form</title>
    </head>

    <body>
        <form action="<?php echo route("artists.store") ?>"  method="POST">
            <?php echo csrf_field() ?>
            <label for="artistName">Navn på artisten</label>
            <input type="text" name="name" id="artistID"><br>
            <button type="submit">tilføj</button>
        </form>
    </body>
    
    
</html>