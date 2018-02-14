<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="page">
            <a href="<?php echo SITE_URL ; ?>/index.php?page=articles"> Home </a>
            <a href="<?php echo SITE_URL ; ?>/index.php?page=contact" > Contact </a>
            <main>
                <?php include SITE_PATH . '/view/'.$datas['view'].'.php'; ?>
            </main>
        </div>
    </body>
</html>