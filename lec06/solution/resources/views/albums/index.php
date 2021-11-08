<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function() {
        $("li").on('click', 'button', function() {
          removeAlbum($(this));
        });
      });
      function removeAlbum(jqueryElement) {
        $.post({
          url: jqueryElement.data("url"),
          data: {_token: "<?php echo csrf_token()?>"}})
        .done(function(result){
          jqueryElement.closest("li").remove();
        });
      }
    </script>

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
                  <div>
                    <?php echo $album->artist->name.": ".$album->name." (".count($album->tracks)." songs)"; ?>
                    <button data-url="<?php echo route('albums.destroy', $album)?>"> <i class="fas fa-trash-alt"></i> </button>
                  </div>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
        <a href='<?php echo route("albums.create")?>'><button>Add new</button></a>
      </div>

      
  </body>
</html>
