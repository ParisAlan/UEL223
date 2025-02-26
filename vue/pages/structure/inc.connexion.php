<?php 
    // à l'inverse des autres pages => ici, si la personne est déjà connecté, alors on ne souhaite pas la voir sur cette page

    if(!empty($_SESSION['login'])) {
        header("Location: ../index.php");
    }
?> 


    <section class="connexion">
        <div class="row">
            <div class="connexion-formulaire">
                <div class="formulaire-gauche">
                    <img src="vue/assets/images/test.png"> 
                </div>
                <div class="formulaire-droite">
                    <h1>Connexion à l'Université Hudson Bay.</h1>
                    <div class="formu">
                        <form class='formuformu' action='' method='post'>
                            <div>
                                <label for='login' class='form-label'></label>
                                <input type='text' id='login' name='login' class='form-control' placeholder='Identifiant' required>
                            </div>
                            <br>
                            <div>
                                <label for='password' class='form-label'></label>
                                <input type='password' id='password' name='password' class='form-control' placeholder='Mot de passe' required>
                            </div>
                            <br>
                            <div class="information-supp">
                                <p>Pour tout problème de connexion veuillez contacter :<br>
                                <span class="email-supp">bdd-aide@unibay.fr</span></p>
                            </div>
                            <?php 
                            if (!empty($_POST)) {
                                $value = 0;
                                if (!empty($_POST['login'])) {
                                    $identifiant = htmlspecialchars(strip_tags($_POST['login']));
                                    $value++;
                                } else {
                                    echo '<p id="mauvais">Veuillez saisir un identifiant valide.</p>';
                                }

                                if (!empty($_POST['password'])) {
                                    $motdepasse = strip_tags($_POST['password']);
                                    if (strlen($motdepasse) >= 4) {
                                        $value++;
                                    } else {
                                        echo '<p id="mauvais">Le mot de passe doit contenir au moins 4 caractères.</p>';
                                    }
                                } else {
                                    echo '<p id="mauvais">Veuillez saisir un mot de passe valide.</p>';
                                }

                                if ($value === 2) {
                                    try {
                                        $requete = $bdd->prepare('SELECT id, identifiant, motdepasse, compte_admin FROM utilisateurs WHERE identifiant = :identifiant');
                                        $requete->execute(['identifiant' => $identifiant]);
                                        $utilisateur = $requete->fetch(PDO::FETCH_ASSOC);

                                        if ($utilisateur && password_verify($motdepasse, $utilisateur['motdepasse'])) {
                                            $_SESSION['password'] = $motdepasse;
                                            $_SESSION['login'] = $identifiant;
                                            $_SESSION['compte_admin'] = $utilisateur['compte_admin'];
                                            $_SESSION['valeur_id'] = $utilisateur['id'];

                                            echo '<p id="correct">Connexion réussie.</p>';
                                            header("Location: ../index.php");
                                            exit;
                                        } else {
                                            echo '<p id="mauvais">Identifiant ou mot de passe incorrect.</p>';
                                        }
                                    } catch (Exception $e) {
                                        echo '<p id="mauvais">Une erreur s’est produite lors de la connexion. Veuillez réessayer.</p>';
                                    }
                                }
                            }
                            ?>
                            <div>
                                <button type='submit' id="btn-1">Se connecter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>