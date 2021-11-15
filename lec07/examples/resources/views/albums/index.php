<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">

  </head>
  <body>
      <h1>Welcome!</h1>

      <div>
        <h2>Albums</h2>
        <div id='albums'>
          <?php if(empty($albums)): ?>
            <p>No albums found :(</p>
          <?php else: ?>
            <ul>
              <?php foreach($albums as $album): ?>
                <li>
                  <div class="album">
                    <?php echo $album->name." (".count($album->tracks)." songs)"; ?>
                  </div>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
        
      </div>

      
  </body>
</html>
