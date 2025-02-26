<?php
$query = $bdd->query("SELECT * FROM `produits` WHERE `mise_en_avant` = 1");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<section class="highlight-shop">
    <div class="row-column">
        <div class="highlight-title">
            <h2>Mise en avant : </h2>
        </div>
        <div class="highlighter">
            <div class="highlighters">
                <?php foreach ($products as $product): ?>
                    <a href="produit.php?id=<?= htmlspecialchars($product['id']) ?>" class="highlight-card">
                        <img class="highlight-pic" src="vue/assets/shop/<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['nom']) ?>">
                        <div class="highlight-txt">
                            <h3><?= htmlspecialchars($product['nom']) ?></h3>
                            <p>€<?= number_format($product['prix'], 2, ',', ' ') ?></p>
                        </div>
                        <div class="button-s">
                            <button class="button-shop"><i class="fa-solid fa-cart-shopping"></i></button>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
