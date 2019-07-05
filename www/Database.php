<?php
require_once ("Chien.php");

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
     //Fonction pour inserer un nouveau Maitre
     public function insertMaster($name, $phoneNumber){

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
public function insertDog($name, $age, $race, $id_maitre){

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
                "SELECT DISTINCT id, nom, race FROM Chiens;");
        
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
//fin de la classe Database
}
?>
