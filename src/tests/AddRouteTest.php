<?php
require_once __DIR__."/../router/Routes.php";
require_once __DIR__."/../controllers/ControllerA.php";

use PHPUnit\Framework\TestCase;
use HomeBrewRouter\Routes;
use HomeBrewRouter\ControllerA;

class AddRouteTest extends TestCase{

    protected $route;

    public function setup():void 
    {
        $this->route=new Routes;
    }
    public static function routeProvider(){
        return [
            "goodGET"=>["GET","/HanumanRouter/src/test",ControllerA::class,"getHello",true],
            "goodPOST"=>["POST","/HanumanRouter/src/create",ControllerA::class,"create",true],
            "wrongMethod"=>["MIAOU","/HanumanRouter/src/create",ControllerA::class,"create",false],
            "wrongController"=>["GET","/HanumanRouter/src/test",ControllerC::class,"getHello",false],
            "wrongFunction"=>["GET","/HanumanRouter/src/test",ControllerA::class,"get",false]

        ];
    }

    /** 
     * @dataProvider routeProvider
    */
   
    public function testAddRoute($method,$url,$controller,$meth,$expected){
        $this->assertEquals($expected,$this->route->addRoute($method,$url,$controller,$meth));
    }
    // public function testAddRouteWrongMethod(){
    //     $this->assertEquals(false,$this->route->addRoute("G","/HanumanRouter/src/test",ControllerA::class,'getHello'));
    // }
    // public function testAddRouteWrongController(){
    //     $this->assertEquals(false,$this->route->addRoute("GET","/HanumanRouter/src/test","HomeBrewRouter\ControllerC",'getHello'));
    // }
    // public function testAddRouteWrongMeth(){
    //     $this->assertEquals(false,$this->route->addRoute("GET","/HanumanRouter/src/test",ControllerA::class,'miaou'));
    // }
    // public function testClassExists(){
    //     $this->assertEquals(true,class_exists('HomeBrewRouter\ControllerA'));
    // }
   


}