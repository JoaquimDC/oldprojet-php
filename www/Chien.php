<?php

class Chien{

//attributs chien
    private $id;
    private $nom;
    private $age;
    private $race;
//attributs maitre
    private $nomMaitre;
    private $telephone;
//constructeur 


 //parametres chien

    public function __set($name, $value){
    }
    public function getId(){
        return $this->id;     
    }
    public function getNom(){
        return $this->nom;
    }
    public function getAge(){
        return $this->age;
    }
    public function getRace(){
        return $this->race;
    }
    public function getnomMaitre(){
        return $this->nomMaitre;
    }
    public function getTelephone(){
        return $this->telephone;
    }


}

?>