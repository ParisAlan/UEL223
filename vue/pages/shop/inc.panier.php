<?php

// Vérifie si le panier existe
if (isset($_SESSION['panier']) && count($_SESSION['panier']) > 0) {

    echo "<h2> Mon Panier : </h2>";
    
    foreach ($_SESSION['panier'] as $produit) {
        echo "<div class='produit-panier'>";
        echo "<img src='vue/assets/shop/" . htmlspecialchars($produit['image']) . "' alt='" . htmlspecialchars($produit['nom']) . "'>";
        echo "<p>Nom : " . htmlspecialchars($produit['nom']) . "</p>";
        echo "<p>Prix : €" . number_format($produit['prix'], 2, ',', ' ') . "</p>";
        echo "<p>Taille : " . htmlspecialchars($produit['taille']) . "</p>";
        echo "<p>ID : " . $produit['id'] . "</p>"; 
        echo "</div>";
    }
} else {
    echo "Votre panier est vide.";
}
?>
