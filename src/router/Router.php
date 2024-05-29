<?php
namespace HomeBrewRouter;
require_once __DIR__."/../utils/Utils.php";
require_once __DIR__."/../controllers/ControllerA.php";
require_once __DIR__."/../controllers/ControllerB.php";


class Router{

      //l'ensemble des routes 

      private $routes = [
        
    ];
    

    //l'ensemble des méthodes

    private $methodList=["GET","POST","PUT","DELETE"];

    public function __construct(){

        $this->loadRoute();
    }

    private function loadRoute(){
        ///ajouter ici les routes
        //$this->addRoute('methode de la requete','l'url',Controller::class,'la méthode du controleur')
        $this->addRoute('GET','ControllerA',ControllerA::class,'getHello');
        $this->addRoute("GET","ControllerA/{id}",ControllerA::class,'findById');
        $this->addRoute("POST","ControllerB",ControllerB::class,"getProut");

    }

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

            preg_match('/^([A-Za-z]*\\\\)*(.*)/',$controller,$matches);
            $controllerClean=$matches[2];  
            if(Utils::controllerExists($controllerClean)){
                if(method_exists($controller,$methodOfController)){

                    $this->routes["/HanumanRouter/".$url]=[$method,$controller,$methodOfController];
                     return true;
     
                 }else{
                     echo "Method not found in $controller !\n";
                     return false;
                 }
            }else{
                echo "Controller not found!\n";
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
            
            if(!Utils::hasParam($urlKey)){

                if($urlKey == $url){
                    //la méthode de la route et celle de la requete sont identiques
                    if($content[0]==$method){

                        $route=$this->routes[$url];
                        //on instancie le controller afin de pouvoir call sa fonction
                        $cont = new $route[1]();

                         //si la méthode est en POST
                        switch($method){
                            case("GET"):
                                call_user_func([$cont,$route[2]]);
                                break;
                            case("POST"):
                                $param=json_decode(file_get_contents('php://input'),true);
                                call_user_func([$cont,$route[2]],$param);
                                break;
                        }
                    }
                }
            }else{ 
                if(Utils::areSame($url,$urlKey)){
                    
                    $route=$this->routes[$urlKey];
                   
                    //instancier le controller
                    $cont = new $route[1]();
                    //on recupère les parametres
                    $param=Utils::extractParam($url);

                    //on call la fonction
                    call_user_func([$cont,$route[2]],$param);//parametre de la requete 
                    return ;
                   
                }else{

                    echo "Route with param not found";
                }
            }   
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