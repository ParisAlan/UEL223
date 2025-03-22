<?php

// Vérifier si la session est active et si l'utilisateur est un admin
if (empty($_SESSION['login']) || !isset($_SESSION['compte_admin']) || $_SESSION['compte_admin'] !== "Y") {
    header("Location: ../index.php");
    exit();
}

// Récupération des produits et stocks
$query = "SELECT p.id, p.nom, p.prix, p.collection, p.couleur, p.image, p.categorie, 
                 p.genre, p.description, 
                 pt.taille_id, t.taille, pt.quantite
          FROM produits p
          LEFT JOIN produits_tailles pt ON p.id = pt.produit_id
          LEFT JOIN tailles t ON pt.taille_id = t.id
          ORDER BY p.id, t.taille";
$test = $bdd->prepare($query);
if ($test->execute()) {
    $produits = $test->fetchAll(PDO::FETCH_GROUP);
} else {
    echo "<p>Erreur lors de la récupération des produits : " . implode(", ", $test->errorInfo()) . "</p>";
}

// Suppression du produit
if (!empty($_GET['suppression_id'])) {
    $idSuppression = (int) $_GET['suppression_id'];

    // Vérification que l'identifiant est valide
    if ($idSuppression > 0) {
        try {
            // Suppression des stocks liés à cet article
            $requete = $bdd->prepare('DELETE FROM produits_tailles WHERE produit_id = :id');
            if (!$requete->execute(['id' => $idSuppression])) {
                echo "<p>Erreur lors de la suppression des stocks liés à l'article.</p>";
            } else {
                // Suppression de l'article dans la table des produits
                $requete = $bdd->prepare('DELETE FROM produits WHERE id = :id');
                if (!$requete->execute(['id' => $idSuppression])) {
                    echo "<p>Erreur lors de la suppression de l'article.</p>";
                } else {
                    echo '<p id="correct">Produit supprimé avec succès.</p>';
                    exit();
                }
            }
        } catch (Exception $e) {
            echo "<p>Erreur lors de la suppression du produit : " . $e->getMessage() . "</p>";
        }
    } else {
        echo '<p id="mauvais"> L\'identifiant est invalide pour la suppression. </p>';
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = (int)$_POST['id'];
        $prix = (float)$_POST['prix'];
        $collection = $_POST['collection'];
        $couleur = $_POST['couleur'];
        $categorie = $_POST['categorie'];
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $genre = $_POST['genre'];
        $stocks = $_POST['stocks'];
        $mise_en_avant = isset($_POST['mise_en_avant']) ? (int)$_POST['mise_en_avant'] : 0;

        // Mise à jour des informations du produit
        $query = 'UPDATE produits SET prix = :prix, collection = :collection, couleur = :couleur, categorie = :categorie, description = :description, genre = :genre, mise_en_avant = :mise_en_avant WHERE id = :id';
        $stmt = $bdd->prepare($query);
        $stmt->execute([
            'id' => $id,
            'prix' => $prix,
            'collection' => $collection,
            'couleur' => $couleur,
            'categorie' => $categorie,
            'description' => $description,
            'genre' => $genre,
            'mise_en_avant' => $mise_en_avant
        ]);

        // Mise à jour des stocks
        foreach ($stocks as $tailleId => $quantite) {
            $query = 'UPDATE produits_tailles SET quantite = :quantite WHERE produit_id = :id AND taille_id = :taille_id';
            $stmt = $bdd->prepare($query);
            $stmt->execute([
                'quantite' => (int)$quantite,
                'id' => $id,
                'taille_id' => (int)$tailleId
            ]);
        }

        echo 'Mise à jour réussie';
    }
    exit();
}

?>

<section class="administration">
    <div class="row-admin">
        <h1 class="title">Gestion des Stocks - Admin Shop</h1>
    </div>

    <div class="products-container">
        <?php foreach ($produits as $id => $details) { ?>
            <div class="cardz">
                <img src="vue/assets/shop/<?= $details[0]['image']; ?>" class="card-image" alt="<?= htmlspecialchars($details[0]['nom']); ?>">
                <div class="card-content">
                    <h3 class="card-title"><?= htmlspecialchars($details[0]['nom']); ?></h3>

                    <!-- Modification des détails du produit -->
                    <div class="card-price">
                        <label for="prix">Prix (€):</label>
                        <input id="nve" type="number" class="prix" data-id="<?= $id; ?>" value="<?= $details[0]['prix']; ?>">
                    </div>

                    <div class="card-collection">
                        <label for="collection">Collection:</label>
                        <input id="nve" type="text" class="collection" data-id="<?= $id; ?>" value="<?= htmlspecialchars($details[0]['collection']); ?>">
                    </div>

                    <div class="card-couleur">
                        <label for="couleur">Couleur:</label>
                        <input id="nve" type="text" class="couleur" data-id="<?= $id; ?>" value="<?= htmlspecialchars($details[0]['couleur']); ?>">
                    </div>

                    <div class="card-categorie">
                        <label for="categorie">Catégorie:</label>
                        <input id="nve" type="text" class="categorie" data-id="<?= $id; ?>" value="<?= htmlspecialchars($details[0]['categorie']); ?>">
                    </div>

                    <div class="card-description">
                        <label for="description">Description:</label>
                        <textarea id="nve" class="description" data-id="<?= $id; ?>"><?= htmlspecialchars($details[0]['description']); ?></textarea>
                    </div>

                    <div class="card-genre">
                        <label for="genre">Genre:</label>
                        <select id="nve" class="genre" data-id="<?= $id; ?>">
                            <option value="homme" <?= ($details[0]['genre'] == 'homme' ? 'selected' : ''); ?>>Homme</option>
                            <option value="femme" <?= ($details[0]['genre'] == 'femme' ? 'selected' : ''); ?>>Femme</option>
                            <option value="uni-sexe" <?= ($details[0]['genre'] == 'uni-sexe' ? 'selected' : ''); ?>>Uni-sexe</option>
                        </select>
                    </div>

                    <div class="card-tailles">
                        <p> Tailles : </p>

                        <?php foreach ($details as $taille) { ?>
                            <div class="card-taille">
                                <span class="taille-name"><?= $taille['taille']; ?>:</span>
                                <input type="number" class="stock" data-id="<?= $id; ?>" data-taille="<?= $taille['taille_id']; ?>" value="<?= $taille['quantite']; ?>">
                            </div>
                        <?php } ?>
                    </div>

                    <!-- Mise en avant -->
                    <div class="mise-en-avant">
                        <label for="mise_en_avant">Mettre en avant:</label>
                        <input type="number" class="mise_en_avant" data-id="<?= $id; ?>" value="<?= (isset($details[0]['mise_en_avant']) ? $details[0]['mise_en_avant'] : 0); ?>" min="0" max="1">
                    </div>

                    <div class="card-actions">
                        <button class="update" data-id="<?= $id; ?>">Mettre à jour</button>
                        <a href="?suppression_id=<?= $id; ?>" class="delete">&#x2716;</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <script>
        // Mise à jour des produits
        $('.update').click(function() {
            let id = $(this).data('id');
            let prix = $('.prix[data-id="' + id + '"]').val();
            let collection = $('.collection[data-id="' + id + '"]').val();
            let couleur = $('.couleur[data-id="' + id + '"]').val();
            let categorie = $('.categorie[data-id="' + id + '"]').val();
            let description = $('.description[data-id="' + id + '"]').val();
            let genre = $('.genre[data-id="' + id + '"]').val();
            let mise_en_avant = $('.mise_en_avant[data-id="' + id + '"]').val();
            let stocks = {};

            $('.stock[data-id="' + id + '"]').each(function() {
                let tailleId = $(this).data('taille');
                let quantite = $(this).val();
                stocks[tailleId] = quantite;
            });

            // Envoi de la requête POST
            $.post('adminshop.php', {
                id: id,
                prix: prix,
                collection: collection,
                couleur: couleur,
                categorie: categorie,
                description: description,
                genre: genre,
                mise_en_avant: mise_en_avant,
                stocks: stocks
            }, function(response) {
                alert('Mise à jour réussie');
            });
        });

        // Suppression de l'article
        $('.delete').click(function(e) {
            e.preventDefault();
            let id = $(this).attr('href').split('=')[1];
            if (confirm('Êtes-vous sûr de vouloir supprimer cet article ?')) {
                window.location.href = '?suppression_id=' + id;
            }
        });
    </script>
</section>