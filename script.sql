
CREATE DATABASE "AnnuaireToutou";

USE "Annuaire toutou";

CREATE USER 'adminToutou'@'localhost' IDENTIFIED BY 'Annu@ireT0ut0u';

GRANT ALL PRIVILEGES ON AnnuaireToutou.* TO 'adminToutou'@'localhost';

CREATE TABLE Maitres (id INT PRIMARY KEY AUTO_INCREMENT,
 nom VARCHAR(200),
  telephone VARCHAR(20)),

CREATE TABLE Chiens (id INT PRIMARY KEY AUTO_INCREMENT,
 nom VARCHAR(255),
  age INT,
   race VARCHAR(200),
    id_maitre INT,
     FOREIGN KEY(id_maitre) REFERENCES Maitres(id));
     
//inserer un maitre
INSERT INTO Maitres (nom,telephone) VALUE('Bob','0798767654');

INSERT INTO Chiens (nom, age, race, id_maitre) VALUE('Boby', 12, 'Labrador', 2);

UPDATE Chiens SET id_maitre = 8 WHERE Chiens . id = 7;

SELECT DISTINCT id, nom, race FROM Chiens;

SELECT DISTINCT id, nom, race FROM Chiens WHERE id=1;

SELECT * FROM Chiens INNER JOIN Maitres ON Chiens.id_maitre = Maitres.id;


SELECT c.id, c.nom, c.age, c.race, m.nom as nomMaitre, m.telephone
FROM Chiens c
INNER JOIN Maitres m
ON c.id_maitre = m.id
WHERE c.id = 7

