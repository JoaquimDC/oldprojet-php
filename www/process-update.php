<?php

require_once ("Database.php");


//importer et instancer une database

$database = new Database();
//recuperer les infos du formulaire
$id = $_POST["id"];
$nom = $_POST["nom"];
$age = $_POST["age"];
$race = $_POST["race"];


// appeler la fonction insertChien
//public function insertChien($name, $age, $race, $id_maitre){


$database->updateChien($id, $nom, $age, $race);
    
header('Location: upDateChien.php?id='.$id);

    

?>
