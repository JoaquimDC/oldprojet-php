<?php
require_once ("Database.php");
require_once ("Chien.php");

$annuaire = new Database();

//<input type="hidden" id="id" name="id" value="nom">
$id = $_GET['id'];

$upDateChien = $annuaire->getChienId($id, $nom, $age, $race);

?>

<html>

<header>
    <link rel="stylesheet" href="style.css">
</header>
<?php 

?>

<body>
 <h2><a href="create-chien.php?id=<?php echo $upDateChien->getId();?>">UPDATE</a></h2>
    
 <h1>Infos Chien:  <?php echo $upDateChien->getId(); ?></h1>

    <h2>Nom : <?php echo $upDateChien->getNom(); ?></h2> 
    <h2>Race : <?php echo $upDateChien->getRace(); ?></h2>
    <h2>Age : <?php echo $upDateChien->getAge(); ?></h2>
    
    <h1>Contact Maitre</h2>
    <h2>Maitre : <?php echo $upDateChien->getnomMaitre(); ?></h2>
    <h2>Contact : <?php echo $upDateChien->gettelephone(); ?></h2>         
              
    <br>
   

</body>
</html>


