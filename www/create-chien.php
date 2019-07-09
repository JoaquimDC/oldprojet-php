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
  $Maitres = $database->getAllchiens();
 
?>

<html>

<header>
 
<link rel="stylesheet" href="style.css">

</header>



<body>
<a id="lienretour" href="listeChiens.php">Afficher la liste Chiens</a>
    <h2>Insérer nouveau chien</h2>
    <div class="Formulaire">    
        <form action="process-create.php" method="post">

            <label for="nomChien">Nom : </label><br>
                <input type="text" id="nomChien" name="nom" placeholder="Entrez le nom du chien" required><br>
            <br>
            <label for="ageChien">Age : </label><br>
                <input type="number" id="ageChien" name="age" placeholder="Entrez l'age du chien" required><br>
            <br>
            <label for="raceChien">Race : </label><br>
                <input type="text" id="raceChien" name="race" placeholder="Entrez la race du chien" required><br>
    </div>
        <br>
   
        <h2>Infos Maitre</h2>
    <div class="infosMaitre"> 
        <label for="choixMaitre">Nom Maitre: </label><br>
    
        <select id="choixMaitre" name="idMaitre">
    </div>
        <br>
                <?php
                foreach($Maitres as $maitre){
                    echo "<option value=".$maitre->getId(). ">" .$maitre->getNom(). "</option>";
                }
                ?>
        </Select>
        <br>
        <br>
        <br>
        <input type="submit">   
        
     
    </form>
   
   

</body>
</html>





