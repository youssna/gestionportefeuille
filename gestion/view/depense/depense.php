<?php include('../commun/header.php'); ?>
<?php require('../../BDD/bdd.php'); ?>

<h2>Ajouter une dépense</h2>

<!-- Formulaire d'ajout -->
<form action="../../controller/depensecontroller.php" method="post" class="mb-4">
    <div class="mb-3">
        <label for="portefeuille" class="form-label">Portefeuille</label>
        <select name="portefeuille_id" id="portefeuille" class="form-select" required>
            <option value="">-- Sélectionner --</option>
            <?php
            $stmt = $pdo->query("SELECT * FROM portefeuille");
            while ($row = $stmt->fetch()) {
                echo "<option value='{$row['id']}'>" . htmlspecialchars($row['nom']) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="categorie" class="form-label">Catégorie</label>
        <select name="categorie_id" id="categorie" class="form-select" required>
            <option value="">-- Sélectionner --</option>
            <?php
            $stmt = $pdo->query("SELECT * FROM categoriedepense");
            while ($row = $stmt->fetch()) {
                echo "<option value='{$row['id']}'>" . htmlspecialchars($row['nom']) . "</option>";
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="montant" class="form-label">Montant (€)</label>
        <input type="number" name="montant" id="montant" class="form-control" step="0.01" required>
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <input type="text" name="description" id="description" class="form-control">
    </div>

    <button type="submit" class="btn btn-danger">Ajouter la dépense</button>
</form>

<!-- Liste des dépenses -->
<h4>Historique des dépenses</h4>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Date</th>
            <th>Portefeuille</th>
            <th>Catégorie</th>
            <th>Description</th>
            <th>Montant (€)</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT d.*, p.nom AS portefeuille_nom, c.nom AS categorie_nom
                FROM depense d
                JOIN portefeuille p ON d.portefeuille_id = p.id
                JOIN categoriedepense c ON d.categorie_id = c.id
                ORDER BY d.date_creation DESC";

        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<tr>
                    <td>" . $row['date_creation'] . "</td>
                    <td>" . htmlspecialchars($row['portefeuille_nom']) . "</td>
                    <td>" . htmlspecialchars($row['categorie_nom']) . "</td>
                    <td>" . htmlspecialchars($row['description']) . "</td>
                    <td>-" . number_format($row['montant'], 2) . "</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

<?php include('../commun/footer.php'); ?>
