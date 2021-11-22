<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    <!-- specifies encoding -->
    <title>Register</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <link rel="stylesheet" href="<?php echo asset("css/app.css")?>">
  </head>
  <body>
      <h1>Register</h1>
      
      <form action="<?php echo route("auth.doRegister")?>" method="POST" >
          <?php if($errors->any()): ?>
          <ul>
          <?php foreach($errors->all() as $error): ?>
            <li><?php echo $error;?></li>
          <?php endforeach; ?>
          </ul>
          <?php endif; ?>
          <?php echo csrf_field(); ?>
          <div class='grid inputGroup'>
            <label> Name: </label>
            <input type="text" name="name" id="name" class="inputForm"/>
          </div>
          <div class='grid inputGroup'>
            <label> Email: </label>
            <input type="email" name="email" id="email" class="inputForm"/>
          </div>
          <div class='grid inputGroup'>
            <label> Password: </label>
            <input type="password" name="password" id="password" class="inputForm"/>
          </div>
          <div class='grid inputGroup'>
            <label> Password Confirmation: </label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="inputForm"/>
          </div>
          <input type="submit" value="Submit">
      </form>
  </body>
</html>
