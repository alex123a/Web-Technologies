<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    <!-- specifies encoding -->
    <title>Album library</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="scripts/ex01.js"></script>
    <script src="scripts/ex02.js"></script>
    <!-- decide one script for validation -->
    
    <!--  <script src="scripts/ex03.js"></script>-->
    <script src="scripts/ex04.js"></script>

    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
      <h1>New Album</h1>
      <?php if($errors->any()): ?>
        <ul>
        <?php foreach($errors->all() as $error): ?>

          <li> <?php echo $error ?> </li>
        <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <form action="<?php echo route('albums.store')?>" method="POST" >
          <?php echo csrf_field(); ?>
          <div class='grid inputGroup'>
            <label> Name: </label>
            <input type="text" name="name" id="name" class="inputForm"/>
          </div>
          <input type="submit" value="Submit">
      </form>

       <form action="<?php echo route('albums.destroy')?>" method="POST" >
          <?php echo csrf_field(); ?>
          <?php echo method_field("DELETE"); ?>
          Press to remove:
          <input type="submit" value="Submit">
      </form>
  </body>
</html>
