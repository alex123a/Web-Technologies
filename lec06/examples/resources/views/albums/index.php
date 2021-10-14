<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\main.css")?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
      function albumNotification() {
        $.get("<?php echo route('albums.notify')?>")
          .done(function(result){
            if(result['new'])
              console.log('new album!');
            else
              console.log('no more albums!');
          });
      }
    </script>


  </head>
  <body>
      <h1>Welcome!</h1>

      <div>
        <h2>Albums</h2>
        <div id='albums'>
          <?php if($albums->isEmpty()): ?>
            <p>No albums found :(</p>
          <?php else: ?>
            <ul>
              <?php foreach($albums as $album): ?>
                <li>
                  <?php echo $album->name; ?>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
      </div>

      
  </body>
</html>
