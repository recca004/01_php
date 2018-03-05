<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL ;?>/css/style.css" />
    </head>
    <body>
        <div id="page">
            
            <nav>
            <ul>
                <li> <a href="<?php echo SITE_URL ; ?>/articles"> Home </a></li>
                <li> <a href="<?php echo SITE_URL ; ?>/contact" > Contact </a></li>
            </ul>
                </nav>
            <main>
                <?php self::includeModule(Bootstrap::$page, Bootstrap::$action, Bootstrap::$router);?>
            </main>
    
          
          
          <footer>
               <?php self::includeModule('contact', 'address');?>
              <?php self::includeModule('menus', 'footer');?>
            </footer> 
            
            
        </div>
    </body>
</html>