<?php

// Vérifie si l'ID est présent
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Prépare la requête pour récupérer le produit
    $stmt = $bdd->prepare("SELECT * FROM produits WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        echo "<div class='product-container'>";

        // Div pour l'image
        echo "<div class='product-img'>";
        echo "<img src='vue/assets/shop/" . htmlspecialchars($product['image']) . "' alt='" . htmlspecialchars($product['nom']) . "'>";
        echo "</div>";

        // Div pour les infos
        echo "<div class='product-text'>";

        // Récupérer la disponibilité du stock
        $stmt_stock = $bdd->prepare("SELECT SUM(pt.quantite) AS total_stock FROM produits_tailles pt WHERE pt.produit_id = ?");
        $stmt_stock->execute([$id]);
        $stock = $stmt_stock->fetch(PDO::FETCH_ASSOC);

        // Message indiquant si le produit est en stock ou non
        $stock_message = ($stock['total_stock'] > 0) ? "<span style='color: green;'>En stock</span>" : "<span style='color: red;'>Rupture de stock</span>";

        // Affichage de la catégorie et de l'état du stock
        echo "<h3>" . htmlspecialchars($product['categorie']) . " - " . $stock_message . "</h3>";

        echo "<h1>" . htmlspecialchars($product['nom']) . "</h1>";
        echo "<p class='desc'>" . htmlspecialchars($product['description']) . "</p>";
        echo "<p class='value'>€" . number_format($product['prix'], 2, ',', ' ') . "</p>";

        // Récupérer les tailles disponibles pour ce produit
        $stmt_sizes = $bdd->prepare("SELECT t.taille, pt.quantite FROM tailles t
                                     JOIN produits_tailles pt ON t.id = pt.taille_id
                                     WHERE pt.produit_id = ?");
        $stmt_sizes->execute([$id]);
        $sizes = $stmt_sizes->fetchAll(PDO::FETCH_ASSOC);

        if ($sizes) {
            echo "<p><strong>Choisissez une taille :</strong></p>";
            echo "<form method='POST' action=''>";  // Formulaire combiné pour la taille et l'ajout au panier
            echo "<select name='taille' id='taille-select' onchange='updateStockInfo()'>"; // Ajout d'un événement onchange pour mettre à jour le stock
            // Ajouter une option vide par défaut
            echo "<option value='' disabled selected>-- Sélectionner une taille --</option>";

            // Affichage des tailles avec leur stock disponible
            foreach ($sizes as $size) {
                echo "<option value='" . htmlspecialchars($size['taille']) . "' data-stock='" . intval($size['quantite']) . "'>";
                echo htmlspecialchars($size['taille']);
                echo "</option>";
            }

            echo "</select>";

            // Zone pour afficher dynamiquement le stock sélectionné
            echo "<p id='stock-info' class='stock-info'>Stock disponible : </p>";

            // Bouton Ajouter au panier
            $disable_button = ($stock['total_stock'] > 0) ? "" : "disabled"; // On ne veut pas laisser la possibilité au client d'acheter si il n'y a plus de stock sur un produit
            echo "<div class='button-p'>";
            echo "<button class='button-shop' name='ajouter_panier' $disable_button><i class='fa-solid fa-cart-shopping'></i> Ajouter au panier</button>";
            echo "</div>";
            echo "</form>"; // Fin du formulaire

        } else {
            echo "<p>Aucune taille disponible.</p>";
        }

        // Si le bouton Ajouter au panier est cliqué
        if (isset($_POST['ajouter_panier'])) {
            // Vérifier si la taille a été sélectionnée
            if (isset($_POST['taille']) && !empty($_POST['taille'])) {
                // Récupère la taille sélectionnée
                $taille_selectionnee = $_POST['taille'];

                // Récupère l'ID de l'utilisateur
                $utilisateur_id = $_SESSION['valeur_id'];  // Assurez-vous d'avoir l'ID de l'utilisateur connecté

                // Vérifier si le produit est déjà dans le panier
                $stmt_check = $bdd->prepare("SELECT id, quantite FROM panier WHERE utilisateur_id = ? AND produit_id = ? AND taille = ?");
                $stmt_check->execute([$utilisateur_id, $product['id'], $taille_selectionnee]);
                $existing_item = $stmt_check->fetch(PDO::FETCH_ASSOC);

                if ($existing_item) {
                    // Si le produit existe déjà dans le panier, on met à jour la quantité
                    $new_quantity = $existing_item['quantite'] + 1;  // Incrémentation de la quantité
                    $stmt_update = $bdd->prepare("UPDATE panier SET quantite = ? WHERE id = ?");
                    $stmt_update->execute([$new_quantity, $existing_item['id']]);
                } else {
                    // Sinon, on ajoute le produit au panier
                    $stmt_add = $bdd->prepare("INSERT INTO panier (utilisateur_id, produit_id, taille, quantite) VALUES (?, ?, ?, ?)");
                    $stmt_add->execute([$utilisateur_id, $product['id'], $taille_selectionnee, 1]);  // Quantité initiale = 1
                }

                echo "<p>Produit ajouté au panier.</p>";
            } else {
                // Afficher un message si aucune taille n'a été sélectionnée
                echo "<p style='color: red;'>Veuillez sélectionner une taille avant d'ajouter au panier.</p>";
            }
        }

        echo "</div>"; // Fin de product-text
        echo "</div>"; // Fin de product-container
    } else {
        echo "Produit introuvable.";
    }
} else {
    echo "ID non valide.";
}
