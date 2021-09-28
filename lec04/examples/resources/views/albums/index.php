<html>
    <body>
        <?php if(Session::has('success')): ?>
            <h1> <?php echo Session::get('success') ?> </h1>
        <?php endif;?>

        <?php foreach($albums as $key => $value): ?>
            <p><?php echo "($key) $value" ?></p>
        <?php endforeach; ?>
    </body>
</html>