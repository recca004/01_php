<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ; ?>/css/style.css" />
    </head>
    <body>
        <div id="page">
                <?php self::includeModule('menus','main'); ?>

            <main>
                <?php self::includeModule(Bootstrap::$page, Bootstrap::$action, Bootstrap::$router); ?>
            </main>
            <footer>
                  <?php 
                  self::includeModule('contact', 'address'); ?>
                <?php 
                  self::includeModule('menus', 'footer'); ?>
            </footer>
        </div>
    </body>
</html>