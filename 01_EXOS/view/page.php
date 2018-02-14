<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <p> <a href="<?php echo SITE_URL; ?>/index.php?page=Articles">Articles</a> </p>
        <p> <a href="<?php echo SITE_URL; ?>/index.php?page=Contact">Contact</a> </p>
        
        
        <div id="page">
            <main>
                <?php include SITE_PATH . '/view/'.$datas['view'].'.php'; ?>
            </main>
        </div>
    </body>
</html>