<?php

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
    public function insertMaster(){

    //Je prepare la requête
    $pdoStatement = $this->connexion->prepare(
        "INSERT INTO Maitres (nom,telephone) VALUES('JoJo','0788767654')");
    
    //je execute la requete
    $pdoStatement->execute();

    //pour debuguer

    var_dump($pdoStatement->errorinfo());

    }
    
}



