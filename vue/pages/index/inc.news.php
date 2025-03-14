<?php
$query = $bdd->query("SELECT * FROM `articles` WHERE `mise_en_avant` = 1");
$news = $query->fetchAll(PDO::FETCH_ASSOC);
?>



<section class="news">
    <div class="row-column">
        <div class="news-title">
            <h2> Vie Universitaire</h2>
        </div>
        <h3>Restez informé(e) des activités sur le campus</h3>

        <div class="container news-container">
            <?php foreach ($news as $new): ?>
                <div class="carddeck">
                    <a href="#">
                        <div class="slide slide1">
                            <div class="content">
                                <div class="icon">
                                    <img class="news-pic" src="<?= htmlspecialchars($new['image']) ?>" alt="<?= htmlspecialchars($new['titre']) ?>">
                                </div>
                            </div>
                        </div>
                        <div class="slide slide2">
                            <div class="content">
                                <p class="articles-text">
                                    <?= htmlspecialchars(substr($new['description'], 0, 175)) . (strlen($new['description']) > 100 ? '...' : '') ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>