<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    <!-- specifies encoding -->
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\main.css")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
  </head>
  <body>
      <h1>New Album</h1>

      <form action="<?php echo route('albums.store')?>" method="POST" >
          <?php echo csrf_field(); ?>
          <div class='grid inputGroup'>
            <label> Name: </label>
            <input type="text" name="name" id="name" class="inputForm"/>
          </div>
          <input type="submit" value="Submit">
      </form>

  </body>
</html>
