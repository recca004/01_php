<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ?>/css/style.css" />
    </head>
    <body>
        <div id="page">
            <nav>
              <ul>
                <li><a href="<?php echo SITE_URL ?>/contact">Contact</a></li>
                <li><a href="<?php echo SITE_URL ?>/articles">Articles</a></li>

              </ul>
            </nav>
            <main>
                <?php include SITE_PATH . '/view/'.$view.'.php'; ?>
            </main>
        </div>
    </body>
</html>
