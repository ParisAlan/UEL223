<!--L'EQUIPE ENSEIGNANTE -->

<?php
$query = $bdd->query("SELECT * FROM `administration`");
$administrations = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<section id="organigramme">
    <div class="section-middle">
        <h2>Notre équipe</h2>
        <div class="equipe_aca">
            <?php foreach ($administrations as $membre): ?>
                <div class="level-1 rectangle">
                    <img class="equipe_fac" src="<?php echo $membre['image']; ?>" alt="<?php echo $membre['prenom'] . ' ' . $membre['nom']; ?>">
                    <h1><?php echo $membre['titre_honorifique'] . ' ' . $membre['prenom'] . ' ' . $membre['nom']; ?></h1>
                    <p><?php echo $membre['metiers']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>