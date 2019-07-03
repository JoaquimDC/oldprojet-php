<?php


require_once ("Database.php");
require_once ("Chien.php");

echo "<h1>Test de la Database : </h1>";

// je instancie une nouvelle connexion à ma base de données
$database = new Database();

//affichage du contenu de la variable pour debugger

if($database->getConnexion() == null){
    echo "<p>La connexion a échoué</p>";
    }
    else{
        echo "<p>BRAVO :) Connexion reussie</p>";  
    }

   //je fais appel a la fonction getChien de la Classe Database   
 $chiens = $database->getAllChiens();

//Je verefie que la requette c'est bien executé.
           echo "Voici la liste de vos chiens";
           
           echo "<ol>";
            foreach($chiens as $test){
                 echo"<li>"
                .$test->getnomMaitre()
                . ", " 
                .$test->getTelephone()
                .", "
                .$test->getNom()
                .", "
                .$test->getAge()
                .", "
                .$test->getRace()
                ."</li>";
            }

            echo "</ol>";   
        

?>
