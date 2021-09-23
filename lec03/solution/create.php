<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="css/main.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="scripts/ex01.js"></script>
    <script src="scripts/ex05.js"></script>
  </head>
  <body>
      <h1>New album in the system</h1>

      <div class='album-info'>
        <div class='grid-item'>
          <label>Name: <?php echo $_POST['name'];?></label>
        </div>

        <div class='grid-item'>
          <label>Artist: <?php echo $_POST['artist'];?></label>
        </div>

        <div class='grid-item'>
          <label># Tracks: <?php echo count($_POST['track']);?></label>
        </div>

        <div class='grid-item grid'>
          <label class='grid-item'>Description: </label>
          <div class='grid-item'> <?php echo $_POST['description'];?> </div>
        </div>
      </div>

      
  </body>
</html>
