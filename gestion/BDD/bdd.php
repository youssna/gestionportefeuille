<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=budget;charset=utf8", "root", "root");
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
