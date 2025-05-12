<?php include('../commun/header.php'); ?>
<?php require('../../BDD/bdd.php'); ?>

<h2>Mes portefeuilles</h2>

<!-- Formulaire d'ajout -->
<form action="../../controller/portefeuillecontroller.php" method="post" class="mb-4">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom du portefeuille</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="solde" class="form-label">Solde initial (€)</label>
        <input type="number" name="solde" id="solde" class="form-control" step="0.01" required>
    </div>
    <button type="submit" class="btn btn-primary">Ajouter</button>
</form>

<!-- Liste des portefeuilles -->
<h4>Liste des portefeuilles</h4>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Solde (€)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $pdo->query("SELECT * FROM portefeuille");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>" . htmlspecialchars($row['nom']) . "</td>
                    <td>" . number_format($row['solde'], 2) . "</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php include('../commun/footer.php'); ?>
