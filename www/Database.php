<?php
require_once ("Chien.php");
require_once ("Maitres.php");

class Database{
//attributs
    private $connexion;
//constructeur
    
    public function __construct(){
        //le chemin vers le serveur
        $PARAM_hote='mariadb';
        //Le port de connexion à la base de données
        $PARAM_port='3306';
        //le nom de votre base de données
        $PARAM_nom_db='AnnuaireToutou';
        //nom de l'utilisateur pour se connecter
        $PARAM_utilisateur='adminToutou';
        //mot de passe 
        $PARAM_mot_passe='Annu@ireT0ut0u';
        try{
            $this->connexion = new PDO(
                'mysql:host='.$PARAM_hote.';dbname='.$PARAM_nom_db,
                $PARAM_utilisateur,
                $PARAM_mot_passe);
        }
        catch(Exception $monException){
                echo 'erreur : '.$monException->getMessage()."<br/>";
                echo 'N° : '.$monException->getCode();
        }    
    }
    public function getConnexion(){
        return $this->connexion;
        }

        //Fonction pour inserer un nouveau Maitre
     public function insertMaitre($name, $phoneNumber){

        //Je prepare la requête
        $pdoStatement = $this->connexion->prepare(
            "INSERT INTO Maitres (nom, telephone)
             VALUES(:paramNom , :paramTel)
             ");
        
        //je execute la requete
        $pdoStatement->execute(array(
            'paramNom' =>$name,
            'paramTel' => $phoneNumber));
    
         //pour debugguer
         $id = $this->connexion->lastInsertId();
            return $id;
         }

//Fonction pour inserer un nouveau Maitre
public function insertChien($name, $age, $race, $id_maitre){

    //Je prepare la requête
    $pdoStatement = $this->connexion->prepare(
        "INSERT INTO Chiens (nom, age, race, id_maitre)
         VALUE (:paramNom, :paramAge, :paramRace, :paramIdMaitre)
         ");
    
    //je execute la requete
    $pdoStatement->execute(array(
        'paramNom' =>$name,
        'paramAge' => $age,
        'paramRace' => $race,
        'paramIdMaitre' => $id_maitre));

     //pour debugguer
     $id = $this->connexion->lastInsertId();
        return $id;
     }

        public function getAllChiens(){
        
            //Je prepare la requête
           
            $pdoStatement = $this->connexion->prepare(
                "SELECT DISTINCT id, nom, age, race FROM Chiens;");
        
        //je execute la requete
            $pdoStatement->execute();
        
        //Je recupere la requete et on stock en php
             $listeChien = $pdoStatement->fetchAll(PDO::FETCH_CLASS,"Chien");
             return $listeChien;
       }
   
    public function getChienId($id){
        
        //Je prepare la requête
       
        $pdoStatement = $this->connexion->prepare(
            "SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
            FROM Chiens c
            INNER JOIN Maitres m
            ON c.id_maitre = m.id
            WHERE c.id = :idChien");
    
    //je execute la requete
        $pdoStatement->execute(array("idChien" => $id));
    
    //Je recupere la requete et on stock en php
        $monChien = $pdoStatement->fetchObject('Chien');
        return  $monChien;
         
        }
    // Creer la fonction pour suprimer un chien via son id
    public function deleteChienId($id){

    //je prepare la requette
        $pdoStatement = $this->connexion->prepare(
            "DELETE FROM Chiens WHERE id = :idChien");

    // execute la requette
    $pdoStatement->execute(
        array("idChien" => $id));
        //var_dump($pdoStatement->errorInfo());

    $errorCode = $pdoStatement->errorCode();
            if ($errorCode == 0){
                return true;
            }
            else {
                return false;
            }       
    }

    public function updateChien($id, $nom, $age, $race){
        $pdoStatement = $this->connexion->prepare(
            "UPDATE Chiens
            SET nom = :nomChien, age = :ageChien, race = :raceChien
            WHERE id = :idChien");
        

        $pdoStatement->execute(array(
            "nomChien" => $nom,
            "ageChien" => $age,
            "raceChien" => $race,
            "idChien" => $id));
    
        
        $errorCode = $pdoStatement->errorCode();
        if ($errorCode == 0){
            return true;
        }
        else {
            return false;
        }    
    }  

    public function getAllmaitres(){

        //Je prepare la requête

        $pdoStatement = $this->connexion->prepare(
            "SELECT * FROM Maitres"
        );

        //je execute la requete
        $pdoStatement->execute();

        //Je recupere la requete et on stock en php
        $listeMaitres = $pdoStatement->fetchAll(PDO::FETCH_CLASS,"Maitre");
        //var_dump ($listemaitres);
        return $listeMaitres;
    }
   //creation de la fonction update chien
/*
   public function getupdateChien($id, $nom, $age, $race){
    $pdoStatement = $this->connexion->prepare(
        "UPDATE Chiens
        SET nom = :nomChien, age = :ageChien, race = :raceChien
        WHERE id = :idChien");
    

    $pdoStatement->execute(array(
        "nomChien" => $nom,
        "ageChien" => $age,
        "raceChien" => $race,
        "idChien" => $id));
    }
*/

}

//fin de la classe Database

?>
