<?php

namespace HomeBrewRouter;

class Routes{

    private static $routes = [

        ['GET','ControllerA',ControllerA::class,'getHello'],
        ["GET","ControllerA/{id}",ControllerA::class,'findById'],
        ["POST","ControllerB",ControllerB::class,"getProut"]
    ];

    public static function getRoutes():array 
    {
        return self::$routes;
    }
}