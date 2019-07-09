


<?php

require_once ("Database.php");
require_once ("Maitres.php");

// je instancie une nouvelle connexion à ma base de données

$database = new Database();

$id = $_GET['id'];

//affichage du contenu de la variable pour debugger
if($database->getConnexion() == null){
    echo "<p>La connexion a échoué</p>";
    }
    else{
       // echo "<p>BRAVO :) Connexion reussie</p>";  
    }

//je fais appel a la fonction getChien de la Classe Database   
 $updateChien = $database->getChienId($id, $nom, $age, $race);
 
?>

<html>

<header>
 

<link rel="stylesheet" href="style.css">

</header>



<body>
<a id="lienretour" href="listeChiens.php">Retour à la liste des Chiens</a>

 <h2>Modifier les données du chien <?php echo $updateChien->getId()?></h2>

<div class="Formulaire">    
       <form action="process-update.php" method="post">
           <input type="hidden" name="id" value="<?php echo $updateChien->getId()?>"><br>
           

           <label for="nomChien">Nom : </label><br>
               <input class="Formulaire2" type="text" id="nomChien" name="nom" placeholder="Entrez le nom du chien" required value="<?php echo $updateChien->getNom()?>"><br>
           <br>
           <label for="ageChien">Age : </label><br>
               <input class="Formulaire2" type="number" id="ageChien" name="age" placeholder="Entrez l'age du chien" required value="<?php echo $updateChien->getAge()?>"><br>
           <br>
           <label for="raceChien">Race : </label><br>
               <input class="Formulaire2" type="text" id="raceChien" name="race" placeholder="Entrez la race du chien" required value="<?php echo $updateChien->getRace()?>"><br>
     
               </div>
        <br>
   

        <input class="Formulaire2" type="submit" value="Modifier">   
 
   </form>
  
  

</body>
</html>





