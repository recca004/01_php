<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="page">
          <a href="<?php echo SITE_URL; ?>/index.php?=articles"> Home</a>
          <a href="<?php echo SITE_URL; ?>/index.php?=contact"> Contact </a>
            <main>
                <?php include SITE_PATH .'/view/'.$view.'.php'; ?>
            </main>
        </div>
    </body>
</html>
