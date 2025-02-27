        <header id="header_blue">
            <div class="row-header">
                <a href="index.php"><img src="vue/assets/images/hudsonlogo.png" alt="Hudson Bay Logo" class="header-logo"></a>

                <nav id="header-nav" class="column">
                    <ul class="row-menu">
                        <li class="header-nav-item">
                            <a href="#" class="header-navi-lien" title="Actualités">Actualités</a>
                        </li>
                        <li class="header-nav-item">
                            <a href="programmes_ac.php" class="header-navi-lien" title="acad">Programmes Académiques</a>
                        </li>
                        <li class="header-nav-item">
                            <a href="#" class="header-navi-lien" title="campus">Vie sur le Campus</a>
                        </li>
                        <li class="header-nav-item">
                            <a href="#" class="header-navi-lien" title="university">L'université</a>
                        </li>
                        <li class="header-nav-item">
                            <p class="header-navi-lien" title="Fazcoins">|</p>
                        </li>
                        <?php
                        // Vérification de la connexion : Si la personne n'est pas connectée, afficher "Se connecter" qui renvoie vers connexion.php.
                        // Sinon, afficher une icône maison qui redirige vers le profil.

                        if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
                            echo "<li class='header-nav-item'><a href='connexion.php' class='header-navi-lien' title='Se connecter'>Se Connecter</a></li>";
                        } else {
                            echo "<li class='header-nav-item'><a href='profile.php' class='header-navi-lien' title='Mon compte'><i class='fa-solid fa-house'></i></a></li>";

                            // Vérification du statut administrateur : Si l'utilisateur est connecté et qu'il a un compte admin, afficher l'icône admin.
                            if (!empty($_SESSION['compte_admin']) && $_SESSION['compte_admin'] === "Y") {
                                echo "<li class='header-nav-item'><a href='admin.php' class='header-navi-lien' title='Admin'><i class='fa-solid fa-user-plus'></i></a></li>";
                            }

                            // Ajout de l'option de déconnexion uniquement si l'utilisateur est connecté.
                            echo "<li class='header-nav-item'><a href='deconnexion.php' class='header-navi-lien' title='Se déconnecter'><i class='fa-solid fa-door-closed'></i></a></li>";
                        }

                        // Le lien vers la boutique est toujours affiché.
                        echo "<li class='header-nav-item'><a href='boutique.php' class='header-navi-lien' title='Boutique'><i class='fa-solid fa-cart-shopping'></i></a></li>";
                        ?>
                    </ul>
                </nav>
            </div>
        </header>