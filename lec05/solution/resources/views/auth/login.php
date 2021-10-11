<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">    <!-- specifies encoding -->
    <title>Create new user</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="<?php echo asset("js/ex02.js")?>"></script>
    <script src="<?php echo asset("js/ex01.js")?>"></script>
    <!-- <script src="<?php echo asset("js/ex04.js")?>"></script> -->

    <link rel="stylesheet" href="<?php echo asset("css/app.css")?>">
  </head>
  <body>

      <?php if(auth()->check()): ?>
        <header class="flex-container">
          <div>
            <?php echo auth()->user()->name ?>
          </div>
          <div>
            <form method="POST" action="<?php echo route('logout')?>">
              <?php echo csrf_field(); ?>
              <input type="submit" value="Log Out">
            </form>
          </div>
        </header>
      <?php else: ?>
        <header class="flex-container">
          <div>
            <a href="<?php echo route("login") ?>"> Sign in </a>
          </div>
          <div>
            <a href="<?php echo route("register") ?>"> Sign up </a>
          </div>
        </header>
      <?php endif; ?>

      <h1>Sign In</h1>
      
      <form action="<?php echo route("login")?>" method="POST" >
          <?php echo csrf_field(); ?>
          <?php if($errors->any()): ?>
            <ul>
            <?php foreach($errors->all() as $error): ?>
              <li><?php echo $error;?></li>
            <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <div class='grid inputGroup'>
            <label> Email: </label>
            <input type="email" name="email" id="email" class="inputForm"/>
            <div class="invalid-feedback">Please provide a valid email.</div>
          </div>

          <div class='grid inputGroup'>
            <label> Password: </label>
            <input type="password" name="password" id="password" class="inputForm"/>
            <div class="invalid-feedback">Please provide a valid password.</div>
          </div>

          <input type="submit" value="Submit">
      </form>
  </body>
</html>
