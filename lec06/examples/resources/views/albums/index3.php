<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\main.css")?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>

    <script>


      var pusher = new Pusher('96ac50f48c18a62165f4', {
        cluster: 'eu'
      });

      var channel = pusher.subscribe('albums');
      channel.bind('App\\Events\\AlbumCreated', function(data) {
        console.log(data);
      });
      // channel.bind('create', function(data) {
      //   console.log(data);
      // });
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
