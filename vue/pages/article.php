<?php
require_once 'structure/inc.head.php';
?>

<?php
require_once 'structure/inc.header.php';
?>

<?php
require_once 'structure/inc.transition.php';
?>

<?php
// Vérifier si le paramètre 'nom' est passé en GET
if (isset($_GET['nom']) && !empty($_GET['nom'])) {
    $nom = $_GET['nom'];

    // Requête SQL sécurisée avec préparation
    $sql = "SELECT * FROM articles WHERE titre = :nom LIMIT 1";
    $stmt = $bdd->prepare($sql);
    $stmt->execute(['nom' => $nom]);

    $article = $stmt->fetch();

    if ($article) {
?>
        <section class="article">
            <div class="article-container">
                <div class="row-column">
                    <div class="article-header">
                        <h1 class="article-title"><?= htmlspecialchars($article['titre']) ?></h1>
                        <p class="article-meta">
                            <span><strong>Auteur :</strong> <?= htmlspecialchars($article['auteur']) ?></span> |
                            <span><strong>Catégories :</strong> <?= htmlspecialchars($article['categories']) ?></span> |
                            <span><strong>Date :</strong> <?= htmlspecialchars($article['date']) ?></span>
                        </p>
                    </div>

                    <?php if (!empty($article['image'])): ?>
                        <div class="article-image-container">
                            <img src="<?= htmlspecialchars($article['image']) ?>" alt="Image de l'article" class="article-image">
                        </div>
                    <?php endif; ?>

                    <div class="article-content">
                        <p class="article-description"><?= nl2br(htmlspecialchars($article['description'])) ?></p>
                        <p><?= nl2br(htmlspecialchars($article['txt_1'])) ?></p>
                        <p><?= nl2br(htmlspecialchars($article['txt_2'])) ?></p>
                        <p><?= nl2br(htmlspecialchars($article['txt_3'])) ?></p>
                    </div>

                    <div class="article-footer">
                        <p><strong>Mise en avant :</strong> <?= ($article['mise_en_avant'] == 1 ? "Oui" : "Non") ?></p>
                        <a href="actualites.php" class="btn-back">← Retour aux articles</a>
                    </div>
                </div>
            </div>
        </section>

<?php
    } else {
        echo "<p class='error'>Aucun article trouvé pour ce titre.</p>";
    }
} else {
    echo "<p class='error'>Paramètre 'nom' manquant ou vide dans l'URL.</p>";
}


require_once 'structure/inc.footer.php';
?>