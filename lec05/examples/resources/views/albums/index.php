<html>
    <body>
        <?php if(session()->has('success')): ?>
            <h1> <?php echo session('success') ?> </h1>
        <?php endif;?>

        <?php foreach($albums as $album): ?>
            <p><?php echo "($album->id) $album->name" ?></p>
        <?php endforeach; ?>
        <h4>You have visit this page: <?php echo $countVisit?> times</h4>
    </body>
</html>