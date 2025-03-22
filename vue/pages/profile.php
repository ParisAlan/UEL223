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
// On bloque l'arrivée sur la page profil si la personne n'est pas connecté
if (empty($_SESSION['login'])) {
    header("Location: ../templates/connexion.php");
}

// On va chercher une variable de session qui permet d'afficher uniquement le profil de la personne connecté.
$env_id = $_SESSION['valeur_id'];

// On fait la requete en utilisant la Foreign Key qui contient l'ID de la personne connecté.
$requete = $bdd->prepare('SELECT * FROM profil WHERE utilisateur_id = :valeur_id');
$requete->execute(['valeur_id' => $env_id]);

// On récupère le résultat
$profil = $requete->fetch(PDO::FETCH_ASSOC);

// Définition de toutes les variables dont on a besoin au cours de la page.
$nom = htmlspecialchars($profil['nom']);
$prenom = htmlspecialchars($profil['prénom']);
$date_naissance = htmlspecialchars($profil['date_naissance']);
$telephone = htmlspecialchars($profil['telephone']);
$adresse = htmlspecialchars($profil['adresse']);
$train = htmlspecialchars($profil['jours_entrainements']);
$text = htmlspecialchars($profil['bio']);
?>


<section class="profil">
    <div class="row-section">
        <div class="profil-title">
            <?php

            // On vérifie si un résultat a été trouvé
            if (!empty($profil)) {
                echo "<img class='anonyme' src='https://www.photoprof.fr/images_dp/photographes/profil_vide.jpg' alt='profil'>";
                echo "<h1 id='title'> $prenom $nom  </h1>";
                // On va venir faire apparaitre un bouton sur le coté droit de la page qui aura pour objectif 
                // d'être une redirection vers la page "edit.php" qui permet de modifier son profil privé.
                echo "<div class='btn-btn'><a href='edit.php'><button class='btn-modif'>Modifier mon profil </button></a></div>";
            } else {
                echo "Profil introuvable pour l'utilisateur avec l'ID $env_id.";
            }

            ?>
        </div>

        <!-- On va venir echo toutes les variables qu'on a appellé plus tôt qui ont prit les informations de la base de données
         que ce soit "vide" pour le moment ou bien, à l'inverse, si c'est rempli. -->


        <div class="profil-profil">
            <div class="profil-left">
                <h3> Présentation : </h3>
                <p id="bio">
                    <?php

                    echo $text;

                    ?>
                </p>
            </div>
            <div class="profil-right">
                <h3>Informations : </h3>

                <h4>Nom :</h4>
                <p id="nom">
                    <?php

                    echo $nom;

                    ?>
                </p>
                <h4>Prénom :</h4>
                <p id="prenom">
                    <?php

                    echo $prenom;

                    ?>
                </p>
                <h4>Téléphone :</h4>
                <p id="telephone">
                    <?php

                    echo $telephone;

                    ?>
                </p>
                <h4>Date de naissance :</h4>
                <p id="date_naissance">
                    <?php

                    echo $date_naissance;

                    ?>
                </p>
                <h4>Jours d'entrainements :</h4>
                <p id="j_train">
                    <?php

                    echo $train;

                    ?>
                </p>


            </div>
        </div>
</section>


<?php
require_once 'structure/inc.footer.php';
?>