<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/custom.css" />
    </head>
    <body>
        <?php $ErrorHandler->get_fixedMessage(); ?>
        <div id="page">
            <menu>
                <h2>
                    <a href="<?php echo SITE_URL; ?>/index.php?page=articles">Articles</a>
                    <a href="<?php echo SITE_URL; ?>/index.php?page=contact">Contact</a>
                </h2>
            </menu>
            <main>
                <?php include SITE_PATH . '/view/' . $view . '.php'; ?>
            </main>
        </div>
    </body>
</html>