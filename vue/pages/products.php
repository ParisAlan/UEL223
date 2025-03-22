<?php
require_once 'structure/inc.head.php';
?>

<?php
require_once 'shop/inc.header.php';
?>

<section class="search-results">
    <div class="row-column">
        <div class="search-results-container">
            <?php
            // Vérifie si une recherche a été effectuée
            $search = isset($_GET['query']) ? trim($_GET['query']) : '';

            if (!empty($search)) {
                // Sécurisation de la recherche
                $search = htmlspecialchars($search);

                // Requête SQL avec bindParam pour sécuriser
                $sql = "SELECT * FROM produits WHERE nom LIKE :search OR description LIKE :search";
                $stmt = $bdd->prepare($sql);

                // Ajout du paramètre de recherche avec bindParam
                $likeSearch = "%$search%";
                $stmt->bindParam(':search', $likeSearch, PDO::PARAM_STR);

                $stmt->execute();
                $produits = $stmt->fetchAll();

                echo "<h2>Résultats pour : <strong class='keyword'>$search</strong></h2>";

                // Vérifie si des produits ont été trouvés
                if (count($produits) > 0) {
                    echo "<div class='product-grid'>";
                    foreach ($produits as $produit) {
                        echo "
                        <div class='product-card'>
                            <img src='vue/assets/shop/{$produit['image']}' alt='{$produit['nom']}'>
                            <h3>{$produit['nom']}</h3>
                            <p>{$produit['prix']}€</p>
                            <a href='produit.php?id={$produit['id']}' class='btn'>Voir le produit</a>
                        </div>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>Aucun produit ne correspond à votre recherche.</p>";
                }
            } else {
                echo "<p>Veuillez entrer un terme de recherche.</p>";
            }
            ?>
        </div>
    </div>
</section>

<?php
require_once 'structure/inc.footer.php';
?>

<style>
    .search-results {
        background-color: var(--tertiary-color);
        padding: 4rem;
    }

    .search-results h2 {
        font-family: 'Fraunces', sans-serif;
        font-weight: 700;
        font-size: 40px;
        color: var(--white-color);
        padding: 0px 0px 5px 0px !important;
        margin: 0px !important;
    }

    .search-results h3 {
        font-size: 18px;
        font-weight: bold;
        color: var(--primary-color);
        text-transform: uppercase;
    }

    .search-results-container {
        width: 100%;
        max-width: 1200px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .product-card {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: center;
        border-radius: 10px;
        background: white;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-card p {
        font-size: 16px;
        color: #444;
    }

    .btn {
        display: inline-block;
        padding: 8px 12px;
        background: var(--yellow-color);
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
    }

    .btn:hover {
        background: var(--white-color);
        border: 1px solid var(--yellow-color);
        color: var(--yellow-color);
    }
</style>