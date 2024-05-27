<?php


require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/router/Router.php";
require_once __DIR__."/controllers/ControllerA.php";
require_once __DIR__."/controllers/ControllerB.php";


use HomeBrewRouter\Router;
use HomeBrewRouter\ControllerA;
use HomeBrewRouter\ControllerB;


$route= new Router();
//var_dump($route->getAllRoutes());
$route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]);


