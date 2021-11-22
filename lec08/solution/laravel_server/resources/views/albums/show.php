<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  </head>
  <body>
        <strong><?php echo $album->name;?> by <?php echo $album->artist->name;?></strong>
        <div>
          <?php echo $album->description;?>
        </div>
      </div>

      
  </body>
</html>
