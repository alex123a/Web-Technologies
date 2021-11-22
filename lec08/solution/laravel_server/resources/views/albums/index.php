<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Album library</title>
    <link rel="stylesheet" href="<?php echo asset("css\app.css")?>">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.13.0/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  </head>
  <body>
      <?php if(auth()->check()): ?>
        <header class="flex-container">
          <div>
            <?php echo auth()->user()->name ?>
          </div>
          <div>
            <form method="POST" action="<?php echo route('auth.logout')?>">
              <?php echo csrf_field(); ?>
              <input type="submit" value="Log Out">
            </form>
          </div>
        </header>
      <?php else: ?>
        <header class="flex-container">
          <div>
            <a href="<?php echo route("auth.login") ?>"> Sign in </a>
          </div>
          <div>
            <a href="<?php echo route("auth.register") ?>"> Sign up </a>
          </div>
        </header>
      <?php endif; ?>

      <h1>Welcome!</h1>
      <?php if(session()->has("success")): ?>
        <div><?php echo session("success");?></div>
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
                  <a href="<?php echo route("albums.show", $album);?>">
                    <?php echo $album->artist->name.": ".$album->name." (".count($album->tracks)." songs)"; ?>
                  </a>
                </li>
              <?php endforeach;?>
            </ul>
          <?php endif;?>
        </div>
        <a class="link-create" href='<?php echo route("albums.create")?>'><button>Add new</button></a>
      </div>

      
  </body>
</html>
