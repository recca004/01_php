<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ;?>/css/style.css" />
    </head>
    <body>
        <div id="page">
     
            <a href="<?php echo SITE_URL ; ?>/articles"> Home </a>
            <a href="<?php echo SITE_URL ; ?>/contact" > Contact </a>
            <main>
                <?php include SITE_PATH . '/view/'.$view.'.php'; ?>
            </main>
        </div>
    </body>
</html>