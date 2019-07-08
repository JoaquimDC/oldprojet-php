
<?php
require_once ("Database.php");
require_once ("Maitres.php");
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
            
            echo "<ul>";
            
             foreach($chiens as $test){
                 echo "<li>";
                 echo "<a href=afficherChien.php?id=" .$test->getId(). ">";
                 echo $test->getId(). " : "
                 .$test->getNom(). " : "
                 .$test->getAge(). " : "
                 .$test->getRace().
                "</a></li>";       
            }
             echo "</ul>";   
    /*$resultat = $database->deleteChienId(12);
            if($resultat == true){
                echo"Vous avez bien effacé le Chien : ";
            }
            else {
                echo "Error le chien n'as pas été supprimé";
            }
            echo $resultat;
            */
            
  
            
//$id, $nom, $age, $race -- important de garder l'ordre

//Appel de la function update
    $resultat = $database->updateChien(5,"toutou", 4, "Terrier");

    if($resultat == true){
         echo "Le chien a été mis a jour";
    }
    else{
            echo "Impossible de mettre a jour le chien";
        }
    
// appel de la fonction getAllmaitres

$resultat = $database->getAllmaitres();
var_dump ($resultat);
    if($resultat == true){
        echo "Liste des Maitres";
    }
    else{
        echo "Impossible de afficher les maitres";
    }

         
           
           
?>