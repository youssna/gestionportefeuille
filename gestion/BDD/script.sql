CREATE DATABASE IF NOT EXISTS budget;

USE budget;

-- Table des catégories de portefeuilles
CREATE TABLE categorieportefeuille (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL
);

-- Table des portefeuilles
CREATE TABLE portefeuille (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL,
solde DECIMAL(10,2) DEFAULT 0.00,
categorie_id INT,
FOREIGN KEY (categorie_id) REFERENCES categorie_portefeuille(id)
);

-- Table des catégories de dépenses
CREATE TABLE categoriedepense (
id INT AUTO_INCREMENT PRIMARY KEY,
nom VARCHAR(50) NOT NULL
);

-- Table des dépenses
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
