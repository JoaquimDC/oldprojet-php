<?php
require_once ("Database.php");

$database = new Database();

$id = $_GET['id'];

$resultat = $database->deleteChienId($id);
if ($resultat == true){
   header('Location: listeChiens.php');
}

else {
   echo "Suppression impossible";
}

?>