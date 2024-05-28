<?php
/**
 * nécessite d'avoir un dossier controleurs
 * à la création d'un controller il faut l'importer dans Router.php
 */

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/router/Router.php";
require_once __DIR__."/utils/Utils.php";
use HomeBrewRouter\Router;
use HomeBrewRouter\Utils;




$route= new Router();
//var_dump($route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]));
//$routes = $route->getAllRoutes();

// $match=null;
// //echo $_SERVER["REQUEST_URI"]."<br>";

// foreach($routes as $url=>$data){

//     if(Utils::hasParam($url)){

        
//         $urlTmp= Utils::extractUri($url);
        
//         $urlTmp = str_replace("/","\/",$urlTmp);
//         $newPattern = Utils::newPattern($urlTmp);
//         //echo $newPattern."<br>";
//          if(preg_match_all($newPattern,$_SERVER["REQUEST_URI"])){
//             $match=$url;
//             echo "yeah";
//             return;
//          };
//         // if(Utils::areSame($_SERVER["REQUEST_URI"],$url)){
//         //     echo 'request matching one the route';
//         // }
//     }else{
//         if($_SERVER["REQUEST_URI"]==$url){
//             $match=$url;
//         }

//     }
// }

// echo $match;