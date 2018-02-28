
var app = angular.module("meteo", ['ngAnimate']); 
app.controller("meteoCtrl", function($scope, $http, $sce) {
    $scope.meteoHide = false;
    $scope.showHide = function (){
        $scope.meteoHide = !$scope.meteoHide;
    }
    $scope.updateMeteo = function (){
        if (typeof($scope.meteo_city) === 'undefined' || $scope.meteo_city === ''){
            $scope.meteo_city = 'Lausanne';
        }
        $scope.meteo_title = $sce.trustAsHtml('Laoding...<br>Please wait');
        $scope.meteo_content = $sce.trustAsHtml('');
        $http({
            method : "GET",
            url : "http://www.prevision-meteo.ch/services/json/" + $scope.meteo_city
        }).then(function success( response ) {
            if (response.status === 200){ // = (readyState === 4) in javascript for comparaison
                if (response.status === 200){
                    if (typeof(response.data.city_info) !== 'undefined') {                
                        $scope.meteo_title = $sce.trustAsHtml(
                                            response.data.city_info.name
                                            + ' (' + response.data.city_info.elevation + ' m)'
                                        );
                        $scope.meteo_content = $sce.trustAsHtml(
                                            'Actuellement: '
                                            + response.data.current_condition.condition
                                            + ' <img height="24" valign="middle" src="'
                                            + response.data.current_condition.icon + '" /> ('
                                            + response.data.current_condition.tmp + '°C)<hr>Demain: '
                                            + response.data.fcst_day_0.condition
                                            + ' <img height="24" valign="middle" src="'
                                            + response.data.fcst_day_0.icon + '" /> (min '
                                            + response.data.fcst_day_0.tmin + '°C, max '
                                            + response.data.fcst_day_0.tmax + '°C)'
                                        );
                    }else{
                        $scope.meteo_title = $sce.trustAsHtml('Ville inconnue.');
                    }
                }else{
                    $scope.meteo_title = $sce.trustAsHtml('Une erreur est survenue.');
                }
            }
        }, function error( response ) {
            $scope.meteo_title = $sce.trustAsHtml('Une erreur est survenue<br>' + response.statusText);
        });     
    };
    $scope.updateMeteo();
});

var xhr, isHide = false;
function loadMeteo() {
    if (typeof(document.getElementById('meteo_city')) === 'undefined' || document.getElementById('meteo_city').value === ''){
        document.getElementById('meteo_city').value = 'Lausanne';
    }
    document.getElementById('meteo_title').innerHTML = 'Loading...<br>Please wait.';
    document.getElementById('meteo_content').innerHTML = '';
    xhr = new XMLHttpRequest();
    xhr.open("GET", "http://www.prevision-meteo.ch/services/json/" + document.getElementById('meteo_city').value, true);
    xhr.onload = function(e) {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                var obj = JSON.parse(xhr.responseText);
                if (obj.city_info !== undefined) {
                    document.getElementById('meteo_title').innerHTML = obj.city_info.name
                            + ' (' + obj.city_info.elevation + ' m)';
                    document.getElementById('meteo_content').innerHTML = 'Actuellement: '
                            + obj.current_condition.condition
                            + ' <img height="24" valign="middle" src="'
                            + obj.current_condition.icon + '" /> ('
                            + obj.current_condition.tmp + '°C)<hr>Demain: '
                            + obj.fcst_day_0.condition
                            + ' <img height="24" valign="middle" src="'
                            + obj.fcst_day_0.icon + '" /> (min '
                            + obj.fcst_day_0.tmin + '°C, max '
                            + obj.fcst_day_0.tmax + '°C)';
                } else {
                    document.getElementById('meteo_title').innerHTML = 'Ville inconnue.';
                }
            } else {
                document.getElementById('meteo_title').innerHTML = 'Une erreur est survenue.';
            }
        }
    };
    xhr.onerror = function(e) {
        document.getElementById('meteo_title').innerHTML = 'Une erreur est survenue.';
    };
    xhr.send(null);
}
function meteoHide(){
    if (isHide){
        isHide = false;
        document.getElementById('meteoJS').classList.remove("hide");
    }else{
        isHide = true;
        document.getElementById('meteoJS').classList.add("hide");
    }
}
loadMeteo();
