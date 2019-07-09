<html>

<header>
<link rel="stylesheet" href="style.css">


</header>


<body>
    <br>
    <a class="lienretour" href="create-chien.php">Inserer un nouveau chien</a></h2>
    
    <?php
    require_once ("Database.php");
    require_once ("Chien.php");
    
    //echo "<h1>Test de la Database : </h1>";
    
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
    $chiens = $database->getAllChiens();
    
    //Je verefie que la requette c'est bien executé.
                echo "<h1>Voici la liste de vos chiens</h1>";
                
                echo "<ul>";
                
                foreach($chiens as $test){
                    echo "<li>";
                    echo "<a href=afficherChien.php?id=" .$test->getId(). ">";
                    echo "N° " .$test->getId(). " = Nom: "
                    .$test->getNom(). ", Age =  "
                    .$test->getAge(). ", Race = "
                    .$test->getRace().
                    ". </li>";       
                }
                echo "</ul>";   
            
    ?>

</body>
 </html>
