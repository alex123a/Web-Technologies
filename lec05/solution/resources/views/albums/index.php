<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


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

      <h1>Welcome!</h1>

      <?php if(session()->has("success")): ?>
        <p><?php echo session("success"); ?></p>
      <?php endif; ?>
      <div>
        <h2>Albums</h2>
        <div id='albums'>
          <?php if(empty($albums)): ?>
            <p>No albums found :(</p>
          <?php else: ?>
            <ul>
              <?php foreach($albums as $album): ?>
                <li>
                  <?php echo $album->artist->name.": ".$album->name."(".count($album->tracks)." songs)"; ?>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
        <a href='<?php echo route("albums.create")?>'><button>Add new</button></a>
      </div>

      <p>In this session you have created <?php echo session("counter",0)?> albums</p>

      
  </body>
</html>
