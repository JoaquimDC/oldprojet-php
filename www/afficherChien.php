<?php
require_once ("Database.php");
require_once ("Chien.php");

$annuaire = new Database();

$id = $_GET['id'];

$nomChien = $annuaire->getChienId($id);

?>

<html>

<header>
    <link rel="stylesheet" href="style.css">
</header>
<?php 

?>

<body>
    <br>
    <a class="lienretour" href="listeChiens.php">Retour liste Chiens</a><br>
    <br>
    <a class="lienretour" href="upDateChien.php?id=<?php echo $nomChien->getId();?>">Mise a jour données du chien</a>
    <br>
    <br>
    <div class="infos3">
        <h1 class="infosMaitre3">Infos Chien:  <?php echo $nomChien->getId(); ?></h1>

        <h2>Nom : <?php echo $nomChien->getNom(); ?></h2> 
        <h2>Race : <?php echo $nomChien->getRace(); ?></h2>
        <h2>Age : <?php echo $nomChien->getAge(); ?></h2>
        
        <h1 class="infosMaitre3">Infos Maitre</h2>
        <h2>Maitre : <?php echo $nomChien->getnomMaitre(); ?></h2>
        <h2>Contact : <?php echo $nomChien->gettelephone(); ?></h2>         
                
        <h2><a href="afficherChien.php?id=<?php echo $nomChien->getId();?>">Delete</a></h2>
    </div>
</body>
</html>


