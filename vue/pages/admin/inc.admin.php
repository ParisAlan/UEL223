<?php


// La première chose à faire est de vérifier que la personne est bien un admin. En effet,
// Il est possible que la personne soit arrivé par ici avec l'arborescence et elle n'a donc rien a faire ici.
// C'est une mesure de sécurité supplémentaire. 
if (empty($_SESSION['login'])) {
    if ($_SESSION['compte_admin'] !== "Y") {
        header("Location: ../index.php");
        // On renvoie directement une personne qui ne serait pas compté comme un compte admin à la page principale.
    }
}

// On prépare une variable qui nous permettra de changer l'affichage des différentes valeurs
if (!empty($_POST) && isset($_POST['choix'])) {
    // Récupération du choix sélectionné par l'utilisateur
    $choix = $_POST['choix'];

    // Liste des choix valides pour validation
    $validChoix = ['utilisateurs', 'equipe', 'joueurs', 'agenda'];

    // Validation stricte de la valeur de $choix pour éviter toute manipulation malveillante du formulaire et le détournement du choix
    if (!in_array($choix, $validChoix, true)) {
        echo '<p id="mauvais"> Il y a un problème avec le choix sélectionné. </p>';
    }
} else {
    $choix = null; // Si aucun choix n'est sélectionné par l'utilisateur, on assigne null à $choix
}


?>


<section class="administration">
    <div class="row-section">
        <h1 class="title"> Create, Read, Update, Delete ( CRUD ) : </h1>
        <form id="choix-table" action="admin.php" method="post">
            <label for="choix"></label>
            <select name="choix" id="choix" required>
                <option value="" disabled selected></option>
                <option value="utilisateurs">utilisateurs</option>
            </select>
            <br>
            <button class="recherche-boom" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="users-container">
        <div class='row-admin'>

            <?php

            // TABLE UTILISATEUR

            if (!empty($_POST)) {
                if ($choix === "utilisateurs") {

                    // Exécution de la requête pour récupérer les utilisateurs
                    $requete = $bdd->prepare('SELECT * FROM utilisateurs');
                    $requete->execute();
                    $row = $requete->fetchAll(PDO::FETCH_ASSOC);

                    // Création de la div contenant les informations
                    $information = "<div class='information-container'>";

                    foreach ($row as $key => $value) {
                        // Construction d'une ligne HTML avec les 3 infos sur une seule ligne
                        $information .= "
                            <div class='info-info'>
                                <p><strong></strong> {$value['id']} |
                                <strong>Identifiant :</strong> {$value['identifiant']} | 
                                <strong>Compte Admin :</strong> {$value['compte_admin']} 
                                <span class='edit-user' data-id='{$value['id']}' data-identifiant='{$value['identifiant']}' style='margin-left: 10px; cursor: pointer; font-size: larger'><i class='fa-solid fa-pencil'></i></span>
                                <a href='admin.php?suppression_id={$value['identifiant']}' class='delete-user' onclick='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur ?\");'>
                                    <i class='fa-solid fa-circle-xmark' style='color: white; margin-left: 10px; cursor: pointer;'></i>
                                </a>
                            </div>";
                    }

                    $information .= "</div>"; // Fermeture de la div parent

                    // Affichage des informations dans la div
                    echo $information;

                    // Regrouper les formulaires dans une div spécifique qu'on affiche directement !
                    echo "
                        <div class='forms-container'>
                            <div class='users'>
                                <div class='row-section'>
                                    <div class='formu-contain'>
                                        <h3 class='title-2'>Ajouter un compte dans la BDD : Utilisateur</h3>
                                        <fieldset class='fieldset'>
                                            <form id='ajout' method='post' action='admin.php'>
                                                <label>Identifiant du compte : <br></label>
                                                <input class='nv' type='text' name='nv_id' required><br><br>

                                                <label>Mot de passe du compte : <br></label>
                                                <input class='nv' type='text' name='nv_mdp' required><br><br>

                                                <label>Administrateur ? 
                                                <br> ( Remplir avec 'Y' ou 'N' )<br></label>
                                                <input class='nv' type='text' name='nv_admin' required><br><br>

                                                <input class='bouton' type='submit' value='Ajouter'>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>";
                }
            }

            // PARTIE 1 / AJOUT D'UN ELEMENT DE LA BASE DE DONNEES !

            // Vérification si le formulaire est soumis
            if (!empty($_POST['nv_id']) && !empty($_POST['nv_mdp']) && !empty($_POST['nv_admin'])) {

                // Initialisation de la variable de validation
                $value = 0;

                // Vérification de l'identifiant
                if (isset($_POST['nv_id']) && !empty($_POST['nv_id'])) {
                    $identifiant = htmlspecialchars($_POST['nv_id']);  // On fait attention et on retire tout le HTML qui pourrait arriver

                    // Vérification de la longueur de l'identifiant
                    if (strlen($identifiant) >= 3) {
                        $value = $value + 1;
                    } else {
                        echo '<p id="mauvais"> L\'identifiant doit comporter au moins 3 caractères. </p>';
                    }
                } else {
                    echo '<p id="mauvais"> Veuillez saisir un identifiant valide. </p>';
                }

                // Vérification du mot de passe
                if (isset($_POST['nv_mdp']) && !empty($_POST['nv_mdp'])) {
                    $motdepasse = htmlspecialchars($_POST['nv_mdp']);  // On fait attention et on retire tout le HTML qui pourrait arriver
                    // Vérification de la longueur du mot de passe
                    if (strlen($motdepasse) >= 3) {
                        $value = $value + 1;
                    } else {
                        echo '<p id="mauvais"> Le mot de passe doit comporter au moins 3 caractères. </p>';
                    }
                } else {
                    echo '<p id="mauvais"> Veuillez saisir un mot de passe valide. </p>';
                }

                // Vérification du compte admin
                if (isset($_POST['nv_admin']) && !empty($_POST['nv_admin'])) {
                    $compteAdmin = htmlspecialchars($_POST['nv_admin']);  // On fait attention et on retire tout le HTML qui pourrait arriver
                    // Vérification que le type de compte est valide
                    if ($compteAdmin === 'Y' || $compteAdmin === 'N') {
                        $value = $value + 1;
                    } else {
                        echo '<p id="mauvais"> Le type de compte admin est invalide. </p>';
                    }
                } else {
                    echo '<p id="mauvais"> Veuillez spécifier un type de compte admin valide. </p>';
                }

                // Si toutes les vérifications sont passées avec succès
                if ($value == 3) {
                    $motdepasseHash = password_hash($motdepasse, PASSWORD_DEFAULT);  // Hash du mot de passe

                    try {
                        $requete = $bdd->prepare(
                            'INSERT INTO utilisateurs (compte_admin, identifiant, motdepasse) VALUES (:admin, :identifiant, :motdepasse)'
                        );
                        $requete->execute([
                            'admin' => $compteAdmin,
                            'identifiant' => $identifiant,
                            'motdepasse' => $motdepasseHash
                        ]);
                        echo '<p id="correct">Utilisateur ajouté avec succès.</p>';
                        $requete->closeCursor();
                    } catch (Exception $e) {
                        echo "<p>Erreur lors de l'ajout du compte : " . $e->getMessage() . "</p>";
                    }
                }
            }


            // PARTIE 2 / MODIFICATION D'UN UTILISATEUR DANS LA BASE DE DONNÉES ! 

            if (!empty($_POST['edit_id']) && !empty($_POST['edit_identifiant']) && !empty($_POST['edit_mdp'])) {
                $idUtilisateur = htmlspecialchars($_POST['edit_id']);
                $nouvelIdentifiant = htmlspecialchars($_POST['edit_identifiant']);
                $nouveauMdp = password_hash($_POST['edit_mdp'], PASSWORD_DEFAULT);  // Hash du mot de passe

                try {
                    $requete = $bdd->prepare('UPDATE utilisateurs SET identifiant = :identifiant, motdepasse = :motdepasse WHERE id = :id');
                    $requete->execute([
                        'identifiant' => $nouvelIdentifiant,
                        'motdepasse' => $nouveauMdp,
                        'id' => $idUtilisateur
                    ]);
                    echo '<p id="correct">Utilisateur modifié avec succès.</p>';
                    $requete->closeCursor();
                } catch (Exception $e) {
                    echo "<p>Erreur lors de la modification du compte : " . $e->getMessage() . "</p>";
                }
            }


            // PARTIE 3 / SUPPRESSION D'UN ELEMENT DE LA BASE DE DONNEES ! 

            // Suppression via le bouton croix rouge
            if (!empty($_GET['suppression_id'])) {
                $idSuppression = htmlspecialchars($_GET['suppression_id']);

                // Vérification que l'identifiant est valide
                if (strlen($idSuppression) >= 3) {
                    try {
                        $requete = $bdd->prepare('DELETE FROM utilisateurs WHERE identifiant = :identifiant');
                        $requete->execute(['identifiant' => $idSuppression]);
                        echo '<p id="correct">Utilisateur supprimé avec succès.</p>';
                        $requete->closeCursor();
                    } catch (Exception $e) {
                        echo "<p>Erreur lors de la suppression du compte : " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo '<p id="mauvais"> L\'identifiant est invalide pour la suppression. </p>';
                }
            }

            ?>
        </div>
    </div>





    <!-- Modale de modification -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class='title-2'>Modifier l'utilisateur</h3>
            <form id="editForm" method="post" action="admin.php">
                <input class='nv' type="hidden" name="edit_id" id="edit_id">

                <label>Nouvel Identifiant :</label>
                <input class='nv' type="text" name="edit_identifiant" id="edit_identifiant" required>
                <br>
                <label>Nouveau Mot de Passe :</label>
                <input class='nv' type="password" name="edit_mdp" id="edit_mdp" required>
                <br>
                <button class="bouton" type="submit">Modifier</button>
            </form>
        </div>
    </div>




</section>