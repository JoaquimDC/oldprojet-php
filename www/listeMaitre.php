
<?php

require_once ("Database.php");

// je instancie une nouvelle connexion à ma base de données
$database = new Database();
//affichage du contenu de la variable pour debugger
if($database->getConnexion() == null){
    echo "<p>La connexion a échoué</p>";
    }
    else{
       // echo "<p>BRAVO :) Connexion reussie</p>";  
    }

//je fais appel a la fonction getChien de la Classe Database   
 $maitres = $database->getAllmaitres();

//Je verefie que la requette c'est bien executé.
           echo "<h1>Voici la liste de vos chiens</h1>";
           
           echo "<ul>";
           
            foreach($maitres as $test){
                echo "<li>";
                echo "<a href=afficherMaitre.php?id=" .$test->getId(). ">";
                echo $test->getId(). " : "
                .$test->getNom(). " : "
                .$test->gettelephone(). " : </li>";       
           }
            echo "</ul>";   
        
?>
