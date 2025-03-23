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
    $validChoix = ['utilisateurs', 'administration', 'agenda'];

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
                <option value="administration">administration</option>
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

                // TABLE ADMINISTRATION

                if ($choix === "administration") {

                    // Exécution de la requête pour récupérer les données de la table administration
                    $requete = $bdd->prepare('SELECT * FROM administration');
                    $requete->execute();
                    $row = $requete->fetchAll(PDO::FETCH_ASSOC);

                    // Création de la div contenant les informations
                    $information = "<div class='information-container'>";

                    foreach ($row as $key => $value) {
                        // Construction d'une ligne HTML avec les 3 infos sur une seule ligne
                        $information .= "
                            <div class='info-info'>
                                <p><strong>ID :</strong> {$value['id']} |
                                <strong>Nom :</strong> {$value['nom']} |
                                <strong>Prénom :</strong> {$value['prenom']} |
                                <strong>Métier :</strong> {$value['metiers']} |
                                <strong>Titre Honorifique :</strong> {$value['titre_honorifique']}
                                <span class='edit-admin' data-id='{$value['id']}' data-nom='{$value['nom']}' style='margin-left: 10px; cursor: pointer; font-size: larger'><i class='fa-solid fa-pencil'></i></span>
                                <a href='admin.php?suppression_id={$value['id']}' class='delete-user' onclick='return confirm(\"Voulez-vous vraiment supprimer cet utilisateur ?\");'>
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
                                        <h3 class='title-2'>Ajouter un nouvel élément dans la BDD : Administration</h3>
                                        <fieldset class='fieldset'>
                                            <form id='ajout' method='post' action='admin.php' enctype='multipart/form-data'>
                                                <label>Nom : <br></label>
                                                <input class='nv' type='text' name='nv_nom' required><br><br>

                                                <label>Prénom : <br></label>
                                                <input class='nv' type='text' name='nv_prenom' required><br><br>

                                                <label>Nom du fichier : ( vue/assets/universite/... ) <br></label>
                                                <input class='nv' type='text' name='nv_image' required><br><br>

                                                <label>Métier : <br></label>
                                                <input class='nv' type='text' name='nv_metiers' required><br><br>

                                                <label>Titre Honorifique : <br></label>
                                                <input class='nv' type='text' name='nv_titre_honorifique' required><br><br>

                                                <input class='bouton' type='submit' value='Ajouter'>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>

                        </div>";
                }
            }

            // TABLE UTILISATEUR - VERIFICATION

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

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // TABLE ADMINISTRATION - VERIFICATION

            // PARTIE 1 / AJOUT D'UN ELEMENT DE LA BASE DE DONNEES ! 

            // Vérification si le formulaire est soumis
            if (!empty($_POST['nv_nom']) && !empty($_POST['nv_prenom']) && !empty($_POST['nv_metiers']) && !empty($_POST['nv_titre_honorifique'])) {

                // Initialisation de la variable de validation
                $value = 0;

                // Vérification du nom
                if (isset($_POST['nv_nom']) && !empty($_POST['nv_nom'])) {
                    $nom = htmlspecialchars($_POST['nv_nom']);
                    $value = $value + 1;
                } else {
                    echo '<p id="mauvais"> Veuillez saisir un nom valide. </p>';
                }

                // Vérification du prénom
                if (isset($_POST['nv_prenom']) && !empty($_POST['nv_prenom'])) {
                    $prenom = htmlspecialchars($_POST['nv_prenom']);
                    $value = $value + 1;
                } else {
                    echo '<p id="mauvais"> Veuillez saisir un prénom valide. </p>';
                }

                // Vérification du métier
                if (isset($_POST['nv_metiers']) && !empty($_POST['nv_metiers'])) {
                    $metiers = htmlspecialchars($_POST['nv_metiers']);
                    $value = $value + 1;
                } else {
                    echo '<p id="mauvais"> Veuillez spécifier un métier valide. </p>';
                }

                // Vérification du titre honorifique
                if (isset($_POST['nv_titre_honorifique']) && !empty($_POST['nv_titre_honorifique'])) {
                    $titre_honorifique = htmlspecialchars($_POST['nv_titre_honorifique']);
                    $value = $value + 1;
                } else {
                    echo '<p id="mauvais"> Veuillez spécifier un titre honorifique valide. </p>';
                }

                // Vérification du titre honorifique
                if (isset($_POST['nv_image']) && !empty($_POST['nv_image'])) {
                    $imagePath = htmlspecialchars($_POST['nv_image']);
                    $value = $value + 1;
                } else {
                    echo '<p id="mauvais"> Veuillez télécharger une image valide. </p>';
                }

                // Si toutes les vérifications sont passées avec succès
                if ($value == 5) {
                    try {
                        $requete = $bdd->prepare(
                            'INSERT INTO administration (nom, prenom, image, metiers, titre_honorifique) VALUES (:nom, :prenom, :image, :metiers, :titre_honorifique)'
                        );
                        $requete->execute([
                            'nom' => $nom,
                            'prenom' => $prenom,
                            'image' => $imagePath,
                            'metiers' => $metiers,
                            'titre_honorifique' => $titre_honorifique
                        ]);
                        echo '<p id="correct">Élément ajouté avec succès.</p>';
                        $requete->closeCursor();
                    } catch (Exception $e) {
                        echo "<p>Erreur lors de l'ajout de l'élément : " . $e->getMessage() . "</p>";
                    }
                }
            }


            // PARTIE 2 / MODIFICATION D'UN UTILISATEUR DANS LA BASE DE DONNÉES ! 

            if (!empty($_POST['edit_id']) && !empty($_POST['edit_nom']) && !empty($_POST['edit_prenom']) && !empty($_POST['edit_metiers']) && !empty($_POST['edit_titre_honorifique'])) {
                $idElement = htmlspecialchars($_POST['edit_id']);
                $nouveauNom = htmlspecialchars($_POST['edit_nom']);
                $nouveauPrenom = htmlspecialchars($_POST['edit_prenom']);
                $nouveauMetier = htmlspecialchars($_POST['edit_metiers']);
                $nouveauTitre = htmlspecialchars($_POST['edit_titre_honorifique']);

                try {
                    $requete = $bdd->prepare('UPDATE administration SET nom = :nom, prenom = :prenom, metiers = :metiers, titre_honorifique = :titre_honorifique WHERE id = :id');
                    $requete->execute([
                        'nom' => $nouveauNom,
                        'prenom' => $nouveauPrenom,
                        'metiers' => $nouveauMetier,
                        'titre_honorifique' => $nouveauTitre,
                        'id' => $idElement
                    ]);
                    echo '<p id="correct">Élément modifié avec succès.</p>';
                    $requete->closeCursor();
                } catch (Exception $e) {
                    echo "<p>Erreur lors de la modification de l'élément : " . $e->getMessage() . "</p>";
                }
            }

            // PARTIE 3 / SUPPRESSION D'UN ELEMENT DE LA BASE DE DONNEES ! 

            // Suppression via le bouton croix rouge
            if (!empty($_GET['suppression_id'])) {
                $idSuppression = htmlspecialchars($_GET['suppression_id']);

                // Vérification que l'identifiant est valide
                if (strlen($idSuppression) >= 1) {
                    try {
                        $requete = $bdd->prepare('DELETE FROM administration WHERE id = :id');
                        $requete->execute(['id' => $idSuppression]);
                        echo '<p id="correct">Élément supprimé avec succès.</p>';
                        $requete->closeCursor();
                    } catch (Exception $e) {
                        echo "<p>Erreur lors de la suppression de l'élément : " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo '<p id="mauvais"> L\'ID est invalide pour la suppression. </p>';
                }
            }
            ?>

        </div>
    </div>
    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // MODALE DE MODIFICATION -->




    <!-- Modale de modification - UTILISATEUR -->
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

    <!-- Modale de modification - ADMINISTRATION -->
    <div id="editModal2" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class='title-2'>Modifier l'élément</h3>
            <form id="editForm" method="post" action="admin.php">
                <input class='nv' type="hidden" name="edit_id" id="edit_id">

                <label>Nom :</label>
                <input class='nv' type="text" name="edit_nom" id="edit_nom" required>
                <br>
                <label>Prénom :</label>
                <input class='nv' type="text" name="edit_prenom" id="edit_prenom" required>
                <br>
                <label>Métier :</label>
                <input class='nv' type="text" name="edit_metiers" id="edit_metiers" required>
                <br>
                <label>Titre Honorifique :</label>
                <input class='nv' type="text" name="edit_titre_honorifique" id="edit_titre_honorifique" required>
                <br>
                <button class="bouton" type="submit">Modifier</button>
            </form>
        </div>
    </div>

</section>