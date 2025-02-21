<?php 
session_start(); 

	// On charge le fichier permettant de se connecter à la bdd
	// include '../inco.connexion.php';

    // à l'inverse des autres pages => ici, si la personne est déjà connecté, alors on ne souhaite pas la voir sur cette page

    //if(!empty($_SESSION['login'])) {
    //    header("Location: ../index.php");
    //}
?> 



    <section class="connexion">
        <div class="row">
            <div class="connexion-formulaire">
                <div class="formulaire-gauche">
                    <img src="vue/assets/images/test.png"> 
                </div>
                <div class="formulaire-droite">
                    <h1> Connexion à l'Université Hudson Bay. </h1>
                    <div class="formu">
                        
                    <form class='formuformu' action='connexion.php' method='post'>
                        <!-- Ici, le formulaire de connexion -->
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
                            <p> Pour tout problème de connexion veuillez contacter :<br>
                            <span class="email-supp"> bdd-aide@unibay.fr </span></p>
                        </div>

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