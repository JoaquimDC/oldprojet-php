<?php

class Maitre{

//attributs Maitre
    private $id;
    private $nom;
    private $telephone;
//constructeur 


 //parametres Maitre

    public function __set($name, $value){
    }
    public function getId(){
        return $this->id;     
    }
    public function getNom(){
        return $this->nom;
    }
    public function getTelephone(){
        return $this->telephone;
    }


}

?>