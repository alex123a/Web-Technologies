<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function() {
        loadFile();
        let responseText = null;
        let data = null;
        
      });
      function loadFile() {
        $.ajax({
          url: "<?php echo route('albums.apiAlbums')?>", 
          success: function(result){
            data = result;
            let ul = $('#albums');
            for (album of data) { 
              let li = $("<li></li>").appendTo(ul);
              console.log(album);
              let text = album["artist"]['name'] +": "+ album["name"] + " ("+album["tracks"].length+" songs)";
              li.text(text);
            }
          }
        });
      }
    </script>

  </head>
  <body>
      <h1>Welcome!</h1>

      <div>
        <h2>Albums</h2>
        <div>
          <ul id="albums">
          </ul>
        </div>
        <a href='<?php echo route("albums.create")?>'><button>Add new</button></a>
      </div>

      
  </body>
</html>
