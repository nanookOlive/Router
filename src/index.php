<?php
/**
 * nécessite d'avoir un dossier controleurs
 * à la création d'un controller il faut l'importer dans Router.php
 */

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/router/Router.php";

require_once __DIR__."/controllers/ControllerA.php";
use HomeBrewRouter\Router;
use HomeBrewRouter\ControllerA;



// $route= new Router();
// $route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]);

//var_dump($route->getAllRoutes());

$url="/HanumanRouter/ControllerA/{id}";
$pattern='/(\/[A-Za-z]*)*({.*})/';
if(preg_match($pattern,$url)){

   
    // $new='/(\/[A-Za-z]*)*([0-9]*)/';
    // preg_match($new,$_SERVER['REQUEST_URI'],$matches);
    // var_dump($matches[2]);
    // $cont=ControllerA::class;
    // call_user_func(["HomeBrewRouter\ControllerA","findById"]);
}