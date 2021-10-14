<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Ajax Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        loadFile();
        let responseText = null;
        let data = null;
        function loadFile() {
            $.ajax({
                url: "<?php echo asset('json/ajax_info.json')?>", 
                success: function(result){
                    data = result;
                    let ul = $('#list');
                    for (album of data['albums']) { 
                        let li = $("<li></li>").appendTo(ul);
                        li.text(album['name']);
                    }
                }
            });
        }
      });
    </script>
  </head>
  <body>

    <ul id='list'>
        
    </ul>      
  </body>
</html>
