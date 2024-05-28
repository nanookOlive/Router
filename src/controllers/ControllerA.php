<?php
namespace HomeBrewRouter;

class ControllerA{

    public function getHello(){
        echo "here's controller A !";
    }
    public function create(){}

    public function findById($id){
        echo $id;
    }
}