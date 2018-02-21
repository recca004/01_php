<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/css/style.css" />
    </head>
    <body>
        <div id="page">
            <menu>
                <h2>
                    <a href="<?php echo SITE_URL ?>/contact">Contact</a><br>
                    <a href="<?php echo SITE_URL ?>/articles">Articles</a>
                </h2>
            </menu>
            <main>
                <?php include SITE_PATH . '/view/'.$view.'.php'; ?>
            </main>
        </div>
    </body>
</html>