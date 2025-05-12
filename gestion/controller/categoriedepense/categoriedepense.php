<?php include('../commun/header.php'); ?>
<?php require('../../BDD/bdd.php'); ?>

<h2>Catégories de dépenses</h2>

<!-- Formulaire d'ajout -->
<form action="../../controller/categoriedepensecontroller.php" method="post" class="mb-4">
    <div class="mb-3">
        <label for="nom" class="form-label">Nom de la catégorie</label>
        <input type="text" name="nom" id="nom" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Ajouter</button>
</form>

<!-- Liste des catégories -->
<h4>Liste des catégories</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $stmt = $pdo->query("SELECT * FROM categoriedepense");
        while ($row = $stmt->fetch()) {
            echo "<tr><td>" . htmlspecialchars($row['nom']) . "</td></tr>";
        }
        ?>
    </tbody>
</table>

<?php include('../commun/footer.php'); ?>
