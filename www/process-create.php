<?php

require_once ("Database.php");


//importer et instancer une database

$database = new Database();
//recuperer les infos du formulaire
$nom = $_POST["nom"];
$age = $_POST["age"];
$race = $_POST["race"];
$id_maitre = $_POST["idMaitre"];

// appeler la fonction insertChien
//public function insertChien($name, $age, $race, $id_maitre){


$nouvelId = $database->insertChien($nom, $age, $race, $id_maitre);
    
//rediriger ver la page avec le nouveau utilisateur 
header('Location: afficherChien.php?id='.$nouvelId);

//recuperer le nouvell id du chien crée
    

//Rediriger l'utilisateur vers la page de profil du nouveau chien









?>
