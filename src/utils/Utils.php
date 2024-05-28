<?php
namespace HomeBrewRouter;


class Utils{


    //function to check if a controller exists
    public static function controllerExists(String $controllerToTest):bool 
    {
        //les controllers doivent être dans le dossiers controllers
        if(is_dir(__DIR__."/../controllers")){

            //on récupère l'ensemble des noms de fichiers
            try{

                if($listOfFiles=scandir(__DIR__."/../controllers")){

                    //on nettoie la liste
                    $listOfFiles = array_diff($listOfFiles,[".",".."]);

                    
                    if(in_array($controllerToTest.".php",$listOfFiles)){
                        return true;
                    }else{
                        echo 'Controller not found in /controllers\n';
                        return false;
                    }
                    

                }else{
                    echo "/controllers is empty ; no controller found\n";
                    return false;
                }

            }catch(Exception $exception){

                echo $eception->getMessage();
                return false;
            }
            return true;

        }else{
            echo "Controllers folder not found !\n";
            return false;
        }
    }


    public static function hasParam(String $request):bool 
    {
        return preg_match('/(.*)(\/{[A-Za-z]*})/',$request);
    }
    public static function extractUri(String $request):?String 
    {
        if(preg_match('/((\/[A-Za-z]*)*)(\/{[A-Za-z0-9]*})$/',$request,$matches)){
            return $matches[1];
        }else{
            return null;
        }
    }
    public static function newPattern(String $route):String
    {
        return "/".$route."\/[A-Za-z0-9]*$/";
    }

    public static function areSame(String $request, String $route):bool
    {
        $route=self::extractUri($route);
        $route=str_replace("/","\/",$route);
        $route=self::newPattern($route);
        return preg_match($route,$request);
    }
}
