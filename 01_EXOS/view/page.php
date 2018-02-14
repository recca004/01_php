<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
    </head>
    <body>
        <div id="page">
            <main>
                
                
                <menu>
                    <h2>
                    <a href="<?php echo SITE_URL . '/index.php?page=contact';?>">Contact</a>
                    <a href="<?php echo SITE_URL . '/index.php?page=articles';?>">Articles</a>
                    </h2>
                </menu>
                <?php include SITE_PATH . '/view/'.$datas['view'].'.php'; ?>
            </main>
        </div>
    </body>
</html>