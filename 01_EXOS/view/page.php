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
<<<<<<< HEAD
                
                
                <menu>
                    <h2>
                    <a href="<?php echo SITE_URL . '/index.php?page=contact';?>">Contact</a>
                    <a href="<?php echo SITE_URL . '/index.php?page=articles';?>">Articles</a>
                    </h2>
                </menu>
                <?php include SITE_PATH . '/view/'.$datas['view'].'.php'; ?>
=======
                <?php include SITE_PATH . '/view/'.$view.'.php'; ?>
>>>>>>> mario2
            </main>
        </div>
    </body>
</html>