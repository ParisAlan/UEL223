<?php

// La première chose à faire est de vérifier que la personne est bien un admin. En effet,
// Il est possible que la personne soit arrivée par ici avec l'arborescence et elle n'a donc rien a faire ici.
// C'est une mesure de sécurité supplémentaire. 
if (empty($_SESSION['login']) || $_SESSION['compte_admin'] !== "Y") {
    header("Location: ../index.php");
    exit();
}

// On prépare une variable qui nous permettra de changer l'affichage des différentes valeurs
$choix = null;
if (!empty($_POST) && isset($_POST['choix'])) {
    // Récupération du choix sélectionné par l'utilisateur
    $choix = $_POST['choix'];

    // Liste des choix valides pour validation
    $validChoix = ['articles'];

    // Validation stricte de la valeur de $choix pour éviter toute manipulation malveillante du formulaire et le détournement du choix
    if (!in_array($choix, $validChoix, true)) {
        echo '<p id="mauvais"> Il y a un problème avec le choix sélectionné. </p>';
    }
}

?>

<section class="administration">
    <div class="row-section">
        <h1 class="title"> Create, Read, Update, Delete ( CRUD ) : </h1>
        <form id="choix-table" action="adminarticles.php" method="post">
            <label for="choix"></label>
            <select name="choix" id="choix" required>
                <option value="" disabled selected></option>
                <option value="articles">articles</option>
            </select>
            <br>
            <button class="recherche-boom" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
    </div>
    <div class="users-container">
        <div class="row-admin">

            <?php
            if (!empty($_POST)) {
                if ($choix === "articles") {
                    $requete = $bdd->prepare('SELECT * FROM articles');
                    $requete->execute();
                    $row = $requete->fetchAll(PDO::FETCH_ASSOC);

                    $information = "<div class='information-container'>";
                    foreach ($row as $key => $value) {
                        // Affichage des données de chaque article
                        $information .= "
                            <div class='info-info'>
                                <p><strong>ID :</strong> {$value['id']} |
                                <strong>Titre :</strong> {$value['titre']} |
                                <strong>Auteur :</strong> {$value['auteur']} |
                                <strong>Catégorie :</strong> {$value['categories']} |
                                <strong>Date :</strong> {$value['date']}
                                <span class='edit-article' data-id='{$value['id']}' data-titre='{$value['titre']}' style='margin-left: 10px; cursor: pointer; font-size: larger'><i class='fa-solid fa-pencil'></i></span>
                                <a href='admin.php?suppression_id={$value['id']}' class='delete-article' onclick='return confirm(\"Voulez-vous vraiment supprimer cet article ?\");'>
                                    <i class='fa-solid fa-circle-xmark' style='color: white; margin-left: 10px; cursor: pointer;'></i>
                                </a>
                            </div>";
                    }

                    $information .= "</div>";
                    echo $information;

                    echo "
                        <div class='forms-container'>
                            <div class='articles'>
                                <div class='row-section'>
                                    <div class='formu-contain'>
                                        <h3 class='title-2'>Ajouter un nouvel article</h3>
                                        <fieldset class='fieldset'>
                                            <form id='ajout' method='post' action='adminarticles.php' enctype='multipart/form-data'>
                                                <label>Description : <br></label>
                                                <textarea class='nv' name='nv_description' required></textarea><br><br>

                                                <label>Image (ex : /images/utilisateur/machin) : <br></label>
                                                <input class='nv' type='text' name='nv_image' required><br><br>

                                                <label>Catégories : <br></label>
                                                <input class='nv' type='text' name='nv_categories' required><br><br>

                                                <label>Texte 1 : <br></label>
                                                <textarea class='nv' name='nv_txt_1' required></textarea><br><br>

                                                <label>Texte 2 : <br></label>
                                                <textarea class='nv' name='nv_txt_2' required></textarea><br><br>

                                                <label>Texte 3 : <br></label>
                                                <textarea class='nv' name='nv_txt_3' required></textarea><br><br>

                                                <label>Mise en avant : <br></label>
                                                <input class='nv' type='text' name='nv_mise_en_avant' required><br><br>

                                                <input class='bouton' type='submit' value='Ajouter'>
                                            </form>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </div>";
                }
            }

            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
            // TABLE ARTICLES - VERIFICATION
            ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

            // PARTIE 1 / AJOUT D'UN ARTICLE
            if (!empty($_POST['nv_description']) && !empty($_POST['nv_image']) && !empty($_POST['nv_categories']) && !empty($_POST['nv_txt_1']) && !empty($_POST['nv_txt_2']) && !empty($_POST['nv_txt_3']) && !empty($_POST['nv_mise_en_avant'])) {

                $value = 0;

                // Validation de chaque champ
                $description = htmlspecialchars($_POST['nv_description']);
                $image = htmlspecialchars($_POST['nv_image']);
                $categories = htmlspecialchars($_POST['nv_categories']);
                $txt_1 = htmlspecialchars($_POST['nv_txt_1']);
                $txt_2 = htmlspecialchars($_POST['nv_txt_2']);
                $txt_3 = htmlspecialchars($_POST['nv_txt_3']);
                $mise_en_avant = htmlspecialchars($_POST['nv_mise_en_avant']);

                // Si toutes les validations sont réussies, on insère l'article dans la base
                try {
                    $requete = $bdd->prepare(
                        'INSERT INTO articles (description, image, categories, txt_1, txt_2, txt_3, mise_en_avant) 
                        VALUES (:description, :image, :categories, :txt_1, :txt_2, :txt_3, :mise_en_avant)'
                    );
                    $requete->execute([
                        'description' => $description,
                        'image' => $image,
                        'categories' => $categories,
                        'txt_1' => $txt_1,
                        'txt_2' => $txt_2,
                        'txt_3' => $txt_3,
                        'mise_en_avant' => $mise_en_avant
                    ]);
                    echo '<p id="correct">Article ajouté avec succès.</p>';
                } catch (Exception $e) {
                    echo "<p>Erreur lors de l'ajout de l'article : " . $e->getMessage() . "</p>";
                }
            }

            // PARTIE 2 / MODIFICATION D'UN ARTICLE
            if (!empty($_POST['edit_id']) && !empty($_POST['edit_description']) && !empty($_POST['edit_image']) && !empty($_POST['edit_categories']) && !empty($_POST['edit_txt_1']) && !empty($_POST['edit_txt_2']) && !empty($_POST['edit_txt_3']) && !empty($_POST['edit_mise_en_avant'])) {
                $idElement = htmlspecialchars($_POST['edit_id']);
                $nouvelleDescription = htmlspecialchars($_POST['edit_description']);
                $nouvelleImage = htmlspecialchars($_POST['edit_image']);
                $nouvelleCategorie = htmlspecialchars($_POST['edit_categories']);
                $nouveauTxt1 = htmlspecialchars($_POST['edit_txt_1']);
                $nouveauTxt2 = htmlspecialchars($_POST['edit_txt_2']);
                $nouveauTxt3 = htmlspecialchars($_POST['edit_txt_3']);
                $nouvelleMiseEnAvant = htmlspecialchars($_POST['edit_mise_en_avant']);

                try {
                    $requete = $bdd->prepare('UPDATE articles SET description = :description, image = :image, categories = :categories, txt_1 = :txt_1, txt_2 = :txt_2, txt_3 = :txt_3, mise_en_avant = :mise_en_avant WHERE id = :id');
                    $requete->execute([
                        'description' => $nouvelleDescription,
                        'image' => $nouvelleImage,
                        'categories' => $nouvelleCategorie,
                        'txt_1' => $nouveauTxt1,
                        'txt_2' => $nouveauTxt2,
                        'txt_3' => $nouveauTxt3,
                        'mise_en_avant' => $nouvelleMiseEnAvant,
                        'id' => $idElement
                    ]);
                    echo '<p id="correct">Article modifié avec succès.</p>';
                } catch (Exception $e) {
                    echo "<p>Erreur lors de la modification de l'article : " . $e->getMessage() . "</p>";
                }
            }

            // PARTIE 3 / SUPPRESSION D'UN ARTICLE
            if (!empty($_GET['suppression_id'])) {
                $idSuppression = htmlspecialchars($_GET['suppression_id']);

                if (strlen($idSuppression) >= 1) {
                    try {
                        $requete = $bdd->prepare('DELETE FROM articles WHERE id = :id');
                        $requete->execute(['id' => $idSuppression]);
                        echo '<p id="correct">Article supprimé avec succès.</p>';
                    } catch (Exception $e) {
                        echo "<p>Erreur lors de la suppression de l'article : " . $e->getMessage() . "</p>";
                    }
                } else {
                    echo '<p id="mauvais"> L\'ID est invalide pour la suppression. </p>';
                }
            }

            ?>

        </div>
    </div>

    <!-- Modale de modification -->
    <div id="editArticleModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h3 class='title-2'>Modifier l'article</h3>
            <form id="editForm" method="post" action="adminarticles.php">
                <input class='nv' type="hidden" name="edit_id" id="edit_id">

                <label>Description :</label>
                <textarea class='nv' name="edit_description" id="edit_description" required></textarea>
                <br>
                <label>Image :</label>
                <input class='nv' type="text" name="edit_image" id="edit_image" required>
                <br>
                <label>Catégories :</label>
                <input class='nv' type="text" name="edit_categories" id="edit_categories" required>
                <br>
                <label>Texte 1 :</label>
                <textarea class='nv' name="edit_txt_1" id="edit_txt_1" required></textarea>
                <br>
                <label>Texte 2 :</label>
                <textarea class='nv' name="edit_txt_2" id="edit_txt_2" required></textarea>
                <br>
                <label>Texte 3 :</label>
                <textarea class='nv' name="edit_txt_3" id="edit_txt_3" required></textarea>
                <br>
                <label>Mise en avant :</label>
                <input class='nv' type="text" name="edit_mise_en_avant" id="edit_mise_en_avant" required>
                <br>
                <button class="bouton" type="submit">Modifier</button>
            </form>
        </div>
    </div>

</section>