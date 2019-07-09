<?php
require_once ("Database.php");
require_once ("Maitres.php");

$listeMaitres = new Database();

$id = $_GET['id'];

$nomMaitre = $listeMaitres->getAllmaitres($id);

?>

<html>

<header>
    <link rel="stylesheet" href="style.css">
</header>
<?php 

?>

<body>
    <h1>Infos Maitre:  <?php echo $nomMaitre->getId($id); ?></h1>

        
    <h2>Nom : <?php echo $nomMaitre->getNom(); ?></h2> 
    <h2>Telephone : <?php echo $nomMaitre->gettelephone(); ?></h2>
       
    <br>
    <br>
    <a href="process-create.php?id=<?php echo $nomMaitre->getId();?>">Create</a>

</body>
</html>


