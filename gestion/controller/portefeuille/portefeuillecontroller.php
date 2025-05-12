<?php
require('../BDD/bdd.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = $_POST['nom'];
    $solde = $_POST['solde'];

    if (!empty($nom) && is_numeric($solde)) {
        $stmt = $pdo->prepare("INSERT INTO portefeuille (nom, solde) VALUES (?, ?)");
        $stmt->execute([$nom, $solde]);
    }
}

header("Location: ../view/portefeuille/portefeuille.php");
exit();
