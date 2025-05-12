<?php
require('../BDD/bdd.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = trim($_POST['nom']);

    if (!empty($nom)) {
        $stmt = $pdo->prepare("INSERT INTO categoriedepense (nom) VALUES (?)");
        $stmt->execute([$nom]);
    }
}

header("Location: ../view/categoriedepense/categoriedepense.php");
exit();
