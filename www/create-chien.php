<?php

 require_once ("Database.php");
 require_once ("Maitres.php");

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
  $Maitres = $database->getAllmaitres();
 /*
 //Je verefie que la requette c'est bien executé.
            echo "<h1>Voici la liste des Maitres</h1>";
            
            echo "<ul>";
            
             foreach($Maitre as $test){
                 echo "<li>";
                 echo $test->getId(). " : "
                 .$test->getNom(). " : "
                 .$test->gettelephone(). " : "
                 ."</li>";       
            }
             echo "</ul>"; 
*/  

?>

<html>

<header>
    <link rel="stylesheet" href="style.css">
</header>

<body>
    <h1>Insérer nouveau chien</h1>
    <form action="process-create.php" method="post">

        <label for="nomChien">Nom : </label>
            <input type="text" id="nomChien" name="nom" placeholder="Entrez le nom du chien"><br>
        <label for="ageChien">Age : </label>
            <input type="number" id="ageChien" name="age" placeholder="Entrez l'age du chien"><br>
        <label for="raceChien">Race : </label>
            <input type="text" id="raceChien" name="race" placeholder="Entrez la race du chien"><br>
        <br>
        <h2>Infos Maitre</h2>
        <label for="choixMaitre">Nom Maitre: </label>
        <select id="choixMaitre" name="idMaitre">
        <br>
                <?php
                foreach($Maitres as $maitre){
                    echo "<option value=".$maitre->getId(). ">" .$maitre->getNom(). "</option>";
                }
                ?>
        </Select>
        <br>
        <br>

        <input type="submit">
     
    </form>
    
   

</body>
</html>





