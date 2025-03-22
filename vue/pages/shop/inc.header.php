        <header id="header_blue">
            <div class="row-header">
                <a class="middle" href="index.php"><img src="vue/assets/images/hudsonlogo.png" alt="Hudson Bay Logo" class="header-logo"></a>

                <nav id="header-nav-shop" class="column">
                    <ul class="row-menu">

                        <!-- ON PREPARE LE FORMULAIRE QUI VA RECEVOIR LES DIFF' INFORMATIONS -->
                        <div class="search-box">
                            <form action="products.php" method="GET">
                                <input type="text" name="query" class="input-search" placeholder="Votre recherche...">
                                <button type="submit" class="btn-search"><i class="fas fa-search"></i></button>
                            </form>
                        </div>


                        <?php
                        // Vérification de la connexion : Si la personne n'est pas connectée, afficher "Se connecter" qui renvoie vers connexion.php.
                        // Sinon, afficher une icône maison qui redirige vers le profil.

                        if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
                            echo "<li class='header-nav-item'><a href='connexion.php' class='header-navi-lien' title='Se connecter'>Se Connecter</a></li>";
                        } else {
                            echo "<li class='header-nav-item'><a href='profile.php' class='header-navi-lien' title='Mon compte'><i class='fa-solid fa-house'></i></a></li>";

                            // Vérification du statut administrateur : Si l'utilisateur est connecté et qu'il a un compte admin, afficher l'icône admin.
                            if (!empty($_SESSION['compte_admin']) && $_SESSION['compte_admin'] === "Y") {
                                echo "<li class='header-nav-item'><a href='adminshop.php' class='header-navi-lien' title='Admin'><i class='fa-solid fa-cart-flatbed'></i></a></li>";
                            }

                            // Ajout de l'option de déconnexion uniquement si l'utilisateur est connecté.
                            echo "<li class='header-nav-item'><a href='deconnexion.php' class='header-navi-lien' title='Se déconnecter'><i class='fa-solid fa-door-closed'></i></a></li>";
                        }

                        // Le lien vers la boutique est toujours affiché.
                        echo "<li class='header-nav-item'><a href='panier.php' class='header-navi-lien' title='Panier'><i class='fa-solid fa-basket-shopping'></i></a></li>";
                        ?>
                    </ul>
                </nav>
            </div>
        </header>