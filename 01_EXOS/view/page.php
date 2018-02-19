<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    </head>
    <body>
        <div id="page">
<ul class="navbar">
    <li><a href="<?php echo SITE_URL ; ?>/index.php?page=articles"><i class="fas fa-home"> Home</i></a></li>
    <li><a href="<?php echo SITE_URL ; ?>/index.php?page=contact" > <i class="fas fa-address-card"> Contact</i> </a></li>
    <li><a href="<?php echo SITE_URL; ?>/index.php?page=articles&action=show"><i class="fas fa-plus-square"> Ajouter un article</i></a></li>
</ul>

            <main>
                <?php include SITE_PATH . '/view/'.$view.'.php'; ?>
            </main>
        </div>
    </body>
</html>