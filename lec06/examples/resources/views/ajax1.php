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
          let xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              responseText = this.responseText;
              data = JSON.parse(this.responseText);
              let ul = $('#list');
              for (album of data['albums']) { 
                let li = $("<li></li>").appendTo(ul);
                li.text(album['name']);
              }
            }
          };
          xhttp.open("GET", "<?php echo asset('json/ajax_info.json')?>", true);
          xhttp.send();
        }
      });
    </script>
  </head>
  <body>

    <ul id='list'>
        
    </ul>      
  </body>
</html>
