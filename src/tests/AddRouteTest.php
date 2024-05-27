<?php
require_once __DIR__."/../router/Router.php";
require_once __DIR__."/../controllers/ControllerA.php";

use PHPUnit\Framework\TestCase;
use HomeBrewRouter\Router;
use HomeBrewRouter\ControllerA;

class AddRouteTest extends TestCase{

    protected $route;

    public function setup():void 
    {
        $this->route=new Router;
    }
    public static function routeProvider(){
        return [
            "goodGET"=>["GET","/HanumanRouter/src/test",ControllerA::class,"getHello",true],
            "goodPOST"=>["POST","/HanumanRouter/src/create",ControllerA::class,"create",true],
            "wrongMethod"=>["MIAOU","/HanumanRouter/src/create",ControllerA::class,"create",false],
            "wrongController"=>["GET","/HanumanRouter/src/test",ControllerC::class,"getHello",false],
            "wrongFunction"=>["GET","/HanumanRouter/src/test",ControllerA::class,"Miaou",false]

        ];
    }

    /** 
     * @dataProvider routeProvider
    */
   
    public function testAddRoute($method,$url,$controller,$meth,$expected){
        $this->assertEquals($expected,$this->route->addRoute($method,$url,$controller,$meth));
    }
    
   


}