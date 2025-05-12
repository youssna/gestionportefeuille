<?php
require('../BDD/bdd.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $portefeuille_id = $_POST['portefeuille_id'];
    $categorie_id = $_POST['categorie_id'];
    $montant = $_POST['montant'];
    $description = trim($_POST['description']);

    if ($portefeuille_id && $categorie_id && is_numeric($montant)) {
        // 1. Ajouter la dépense
        $stmt = $pdo->prepare("INSERT INTO depense (portefeuille_id, categorie_id, montant, description) VALUES (?, ?, ?, ?)");
        $stmt->execute([$portefeuille_id, $categorie_id, $montant, $description]);

        // 2. Mettre à jour le solde du portefeuille
        $stmt2 = $pdo->prepare("UPDATE portefeuille SET solde = solde - ? WHERE id = ?");
        $stmt2->execute([$montant, $portefeuille_id]);
    }
}

header("Location: ../view/depense/depense.php");
exit();
