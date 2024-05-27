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
                        return false;
                    }
                    

                }else{
                    return false;
                }

            }catch(Exception $exception){

                echo $eception->getMessage();
                return false;
            }
            return true;

        }else{
            echo "controllers folder not found !\n";
            return false;
        }
    }
}