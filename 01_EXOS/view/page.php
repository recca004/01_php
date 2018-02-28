<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Articles</title>
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/css/style.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo SITE_URL; ?>/css/custom.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular-animate.js"></script>
    </head>
    <body>
        <div id="page">
            
                <?php self::includeModule( 'menus', 'main' ); ?>
            
            <!--
            <banner>
                
                <div style="float:left;" ng-app="meteo" ng-controller="meteoCtrl" class="widget meteo" ng-hide="meteoHide">
                    <div class="meteoButtonHide" ng-click="showHide()" ng-model="meteoHide">--</div>
                    <p><strong>Meteo with AngularJS</strong></p>
                    <form><input ng-model="meteo_city" type="text" value="{{meteo_city}}"><input ng-click="updateMeteo()" type="submit" value="Ok"></form>
                    <span ng-model="meteo_title" class="title" ng-bind-html="meteo_title"></span>
                    <span ng-model="meteo_content" class="content" ng-bind-html="meteo_content"></span>
                </div>
                
                
                
                <div style="float:right;" id="meteoJS" class="widget meteo">
                    <div class="meteoButtonHide" onClick="javascript:meteoHide();">--</div>
                    <p><strong>Meteo with Javascript</strong></p>
                    <form action="javascript:loadMeteo();" method="post"><input type="text" id="meteo_city" value=""><input type="submit" value="Ok"></form>
                    <span id="meteo_title" class="title"></span>
                    <span id="meteo_content" class="content"></span>
                </div>
                <script src="<?php echo SITE_URL; ?>/application/meteo.js"></script>
                
            </banner>
            -->
            
            <main>
                <?php self::includeModule( Bootstrap::$page, Bootstrap::$action, Bootstrap::$router ); ?>
            </main>
            
            <footer>
                <?php self::includeModule( 'menus', 'footer' ); ?>
            </footer>
            
        </div>
    </body>
</html>