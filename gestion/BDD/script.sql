CREATE DATABASE IF NOT EXISTS budget;

USE budget;

CREATE TABLE portefeuille (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50),
    solde DECIMAL(10,2)
);

CREATE TABLE categoriedepense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50)
);

CREATE TABLE depense (
    id INT AUTO_INCREMENT PRIMARY KEY,
    portefeuille_id INT,
    categorie_id INT,
    montant DECIMAL(10,2),
    description VARCHAR(100),
    date_creation DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portefeuille_id) REFERENCES portefeuille(id),
    FOREIGN KEY (categorie_id) REFERENCES categoriedepense(id)
);
