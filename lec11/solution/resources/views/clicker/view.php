<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <?php if(!$classic): ?>
      <script>
        $(document).ready(function () {
          $("form").submit(function(e) {
            e.preventDefault();

            var form = $(this);
            $.ajax({
              type: form.attr('method'),
              url : form.attr('action'),
              data: form.serialize(),
              success: function(data) {
                $("#count-text").html("Count is "+data["count"]);
              }
            });
            return false;
          });
        });
      </script>
    <?php endif; ?>

  </head>
  <body class="clicker">
      <h1>Welcome!</h1>

      <div class="clicker-box">
        <div id="count-text"> Count is <?php echo $count?></div>

        <?php 
          if($classic)
            $link = route("clicker.classic.save");
          else
            $link = route("clicker.ajax.save");
        ?>
        <form action="<?php echo $link?>" method="POST" >
          <?php echo csrf_field(); ?>
          <input type="submit" value="Click me!">
        </form>

      </div>

      
  </body>
</html>
