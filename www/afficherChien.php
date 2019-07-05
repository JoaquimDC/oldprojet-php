<?php
require_once ("Database.php");
require_once ("Chien.php");

$annuaire = new Database();

$id = $_GET['id'];

$monChien = $annuaire->getChienId($id);

?>

<html>

<header>
    <link rel="stylesheet" href="style.css">
</header>
<?php 

?>

<body>
    <h1>Infos Chien:  <?php echo $monChien->getId(); ?></h1>

    <h2>Nom : <?php echo $monChien->getNom(); ?></h2> 
    <h2>Race : <?php echo $monChien->getRace(); ?></h2>
    <h2>Age : <?php echo $monChien->getAge(); ?></h2>
    
    <h1>Contact Maitre</h2>
    <h2>Maitre : <?php echo $monChien->getnomMaitre(); ?></h2>
    <h2>Contact : <?php echo $monChien->gettelephone(); ?></h2>         
        
     

</body>
</html>


