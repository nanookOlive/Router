<?php
namespace HomeBrewRouter;
require_once __DIR__."/../utils/Utils.php";


class Routes{

      //l'ensemble des routes 

      private $routes = [
        
    ];

    //l'ensemble des méthodes

    private $methodList=["GET","POST","PUT","DELETE"];

    //public function __construct(){}

    public function getAllRoutes():Array|null 
    {
        if(!empty($this->routes)){
            return $this->routes;
        }else{
            return null;
        }
    }

    public function addRoute(String $method, String $url,String $controller, String $methodOfController):bool{

        //pas d'erreur sur la méthode
        if(in_array($method,$this->methodList)){
            //on retire le namespace de 
            if(Utils::controllerExists($controller)){
                if(method_exists($controller,$methodOfController)){

                    $this->routes[$url]=[$method,$controller,$methodOfController];
                     return true;
     
                 }else{
                     echo "Method not found in $controller !\n";
                     return false;
                 }
            }else{
                echo "Controller not found!<br>";
                return false;
            }
            
        }else{
            echo "Invalid method !\n";
            return false;
        }

    }

    public function callMethode(String $url, String $method){

        $route=null;
        foreach($this->routes as $urlKey => $content){
            if($urlKey == $url){
                if($content[0]==$method){
                    $route=$this->routes[$url];
                }
            }
        }
        //quid si deux routes identiques mais méthode !=
        //quid si param dans route
        if($route != null){
            $cont = new $route[1]();
            call_user_func([$cont,$route[2]]);
        }
        
        
    }
    public function callMethodeByObject(Object $object, String $method){

        if(method_exists($object::class,$method)){
            //Appelle de la fonction
             call_user_func([$object::class,$method]);
        }else{

            echo "invalide methode";
        }
    }

   
    //faire une méthode qui va regarder dans tous les dossiers afin de vérifier que la classe existe 
    
}