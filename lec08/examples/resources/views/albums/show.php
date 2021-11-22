<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">

  </head>
  <body>
      <h1>Album <?php echo $album->name?></h1>

      <div>
        <h2>Description</h2>
        <div>
          <?php echo $album->description?>
        </div>
        
      </div>

      
  </body>
</html>
