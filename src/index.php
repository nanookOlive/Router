<?php


require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/router/Routes.php";
require_once __DIR__."/controllers/ControllerA.php";
require_once __DIR__."/controllers/ControllerB.php";
require_once __DIR__."/utils/Utils.php";


use HomeBrewRouter\Routes;
use HomeBrewRouter\ControllerA;
use HomeBrewRouter\ControllerB;
use HomeBrewRouter\Utils;


$route= new Routes();
//$route->addRoute("GET","/HanumanRouter/src/test",ControllerA::class,'getHello');
//$route->addRoute("GET","/HanumanRouter/src/prout",ControllerB::class,'getProut');
// $route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),"GET");


