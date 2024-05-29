<?php
/**
 * nécessite d'avoir un dossier controleurs
 * à la création d'un controller il faut l'importer dans Router.php
 */

require_once __DIR__."/../vendor/autoload.php";
require_once __DIR__."/router/Router.php";
use HomeBrewRouter\Router;




$route= new Router("HanumanRouter");
$route->callMethode(parse_url($_SERVER["REQUEST_URI"],PHP_URL_PATH),$_SERVER["REQUEST_METHOD"]);
