<html>
  <body>

    <?php if(array_key_exists("name",$_GET)):?>
        <?php
          echo "<h1>Hello, ".$_GET['name'] ."!</h1>";
        ?>
    <?php else:?>
        <?php
          echo '<h1>Hello, World!</h1>';
        ?>
    <?php endif; ?>
  </body>
</html>