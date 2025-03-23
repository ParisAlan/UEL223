<?php
require_once 'structure/inc.head.php';
?>

<header id="header">
	<div class="inner">
		<a href="index.php" class="image avatar"><img src="vue/assets/images/hudsonlogo.png" alt="" /></a>
		<h1><strong>Découvrez toutes nos actualités</strong><br />
		</h1>
		<?php
		// Vérification du statut administrateur : Si l'utilisateur est connecté et qu'il a un compte admin, afficher l'icône admin.
		if (!empty($_SESSION['compte_admin']) && $_SESSION['compte_admin'] === "Y") {
			echo "<li class='header-nav-item'><a href='adminarticles.php' class='header-navi-lien' title='Boutique'><i class='fa-solid fa-book'></i></a></li>";
		}
		?>
	</div>

</header>

<div id="main">

	<section id="one">
		<header class="major">
			<h2>Actualités de l'Université Hudson Bay</h2>
		</header>
		<p>Bienvenue sur la page des actualités de l'Université Hudson Bay ! Ici, retrouvez les dernières informations, événements et temps forts qui animent notre campus. De la vie académique aux initiatives étudiantes, en passant par les compétitions sportives et les conférences, restez informé sur tout ce qui fait vibrer notre université.

			Ne manquez aucune annonce et participez pleinement à la vie de notre communauté universitaire !</p>
	</section>

	<?php
	// Récupérer les articles depuis la base de données
	$query = $bdd->query("SELECT titre, description, image FROM articles ORDER BY date DESC LIMIT 6");
	$articles = $query->fetchAll();
	?>

	<section id="two">
		<h2>Nos actualités récentes</h2>
		<div class="row-actualites">
			<?php foreach ($articles as $article): ?>
				<article class="col-6 col-12-xsmall work-item">
					<a href="article.php?nom=<?= urlencode($article['titre']) ?>" class="image fit thumb">
						<img src="<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['titre']) ?>" />
					</a>
					<h3><a id="link-a" href="article.php?nom=<?= urlencode($article['titre']) ?>"><?= htmlspecialchars($article['titre']) ?></a></h3>
					<p><?= htmlspecialchars(substr($article['description'], 0, 150)) . '...' ?></p>
				</article>
			<?php endforeach; ?>
		</div>
	</section>
</div>


</body>

</html>