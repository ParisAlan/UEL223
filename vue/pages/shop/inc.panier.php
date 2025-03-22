<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'produit_supprime') {
        echo "<p class='success-message'>Le produit a été supprimé avec succès.</p>";
    } elseif ($_GET['message'] == 'erreur_suppression') {
        echo "<p class='error-message'>Une erreur s'est produite lors de la suppression du produit.</p>";
    } elseif ($_GET['message'] == 'erreur_panier_id') {
        echo "<p class='error-message'>ID de panier manquant.</p>";
    }
}
?>


<section class="panier">
    <div class="row-column">
        <div class="news-title">
            <h2>Mon Panier</h2>
        </div>
        <h3>Vos articles sélectionnés :</h3>

        <div class="panier-content">
            <?php
            // Vérifier si l'utilisateur est connecté
            if (isset($_SESSION['valeur_id'])) {
                // Récupérer l'ID de l'utilisateur connecté
                $utilisateur_id = $_SESSION['valeur_id'];

                // Récupérer les articles dans le panier de l'utilisateur
                $panier_recup = $bdd->prepare("SELECT p.nom, p.prix, p.image, pa.taille, pa.quantite, pa.id AS panier_id
                       FROM panier pa
                       JOIN produits p ON pa.produit_id = p.id
                       WHERE pa.utilisateur_id = ?");
                $panier_recup->execute([$utilisateur_id]);
                $articles = $panier_recup->fetchAll(PDO::FETCH_ASSOC);

                // Vérifier si le panier contient des produits
                if ($articles && count($articles) > 0) {
                    $total = 0;

                    // Boucle pour afficher chaque produit dans le panier
                    foreach ($articles as $produit):
                        $total += $produit['prix'] * $produit['quantite'];
            ?>
                        <div class="produit-panier">
                            <img class="panier-pic" src="vue/assets/shop/<?= htmlspecialchars($produit['image']) ?>" alt="<?= htmlspecialchars($produit['nom']) ?>">

                            <div class="details-produit">
                                <p class="nom-produit"><?= htmlspecialchars($produit['nom']) ?></p>
                                <p class="prix-produit">Prix : <?= number_format($produit['prix'], 2, ',', ' ') ?> €</p>
                                <p class="taille-produit">Taille : <?= htmlspecialchars($produit['taille']) ?></p>
                                <p class="quantite-produit">Quantité : <?= $produit['quantite'] ?></p>
                            </div>

                            <!-- Formulaire de suppression du produit -->
                            <form method="POST" action="supprimer_produit.php" class="form-supprimer">
                                <input type="hidden" name="panier_id" value="<?= $produit['panier_id'] ?>">
                                <button type="submit" class="btn-supprimer"><i class="fas fa-trash"></i></button>
                            </form>
                        </div>
            <?php
                    endforeach;

                    // Affichage du total du panier
                    echo "<div class='total-panier'>Total : <strong>" . number_format($total, 2, ',', ' ') . " €</strong></div>";
                    echo "<button class='bouton'>Passer la commande</button>";
                } else {
                    echo "<p class='panier-vide'>Votre panier est vide.</p>";
                }
            } else {
                echo "<p class='panier-vide'>Veuillez vous connecter pour voir votre panier.</p>";
            }
            ?>
        </div>
    </div>
</section>