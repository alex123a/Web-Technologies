<html>
    <body>
        <?php if($user): ?>
            <h1>Welcome <?php echo $user->name?></h1>
        <?php else: ?>
            <h1>Welcome Guest</h1>
        <?php endif;?>
    </body>
</html>