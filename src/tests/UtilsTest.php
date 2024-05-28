<?php

require_once __DIR__."/../utils/Utils.php";

use PHPUnit\Framework\TestCase;
use HomeBrewRouter\Utils;

class UtilsTest extends TestCase{

    public static function controllerProvider(){
        return [
            ["ControllerA",true],
            ["ControllerC",false],
            ["ControllerB",true]
        ];
    }

    public static function requestProvider()
    {
        return [
            ["/HanumanRouter/ControllerA/{id}",true],
            ["/HanumanRouter/ControllerA",false],
            ["/HanumanRouter/ControllerA/{nom}",true],
            ["/HanumanRouter/ControllerB",false],
            ["/HanumanRouter/ControllerB/",false],
        ];
    }
    public static function uriProvider()
    {
        return [
            ["/HanumanRouter/ControllerA/{13}","/HanumanRouter/ControllerA"],
            ["/HanumanRouter/ControllerA",null],
            ["/HanumanRouter/ControllerA/{nom}","/HanumanRouter/ControllerA"],
            ["/HanumanRouter/ControllerB/{14}","/HanumanRouter/ControllerB"],
            ["/HanumanRouter/ControllerB/{yaourt}","/HanumanRouter/ControllerB"],
        ];
    }

    public static function sameProvider(){
        return [
            ["/HanumanRouter/ControllerA/{id}","/HanumanRouter/ControllerA/13",true],
            ["/HanumanRouter/ControllerA/{miaou}","/HanumanRouter/ControllerA/miaou",true],
            ["/HanumanRouter/ControllerA/{brouette}","/HanumanRouter/ControllerA/gnniii",true],
            ["/HanumanRouter/ControllerA/{prout}","/HanumanRouter/ControllerA/caca",true],
            ["/HanumanRouter/ControllerA/{floutch}","/HanumanRouter/ControllerA/ahhh",true],

        ];
    }
    /**
     * @dataProvider requestProvider
     */

    public function testRequestParam($request,$expected){
        $this->assertEquals($expected,Utils::hasParam($request));
    }

    /**
     * @dataProvider uriProvider
     */
    public function testUriSame($request,$expected){
        $this->assertEquals($expected,Utils::extractUri($request));
    }
    /**
     * @dataProvider sameProvider
     */
    public function testSame($route,$request,$expected){
        $this->assertEquals($expected,Utils::areSame($request,$route));
    }
/**
 * @dataProvider controllerProvider
 */
    public function testExists($controller,$expected){

        $this->assertEquals($expected,Utils::controllerExists($controller));
    }
    
}