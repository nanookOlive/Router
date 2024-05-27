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
/**
 * @dataProvider controllerProvider
 */
    public function testExists($controller,$expected){

        $this->assertEquals($expected,Utils::controllerExists($controller));
    }
    
}