<?php 
// On utilise session_destroy afin de venir effacer toutes les variables de session afin de vraiment pouvoir permettre à la personne
// de venir se deconnecter.
session_destroy();

// Pour rajouter une seconde sécurité, on va venir ajouter la ligne suivante qui va détruire la session
unset($_SESSION);

// Après cela, on va venir rediriger directement la personne vers la page "index".
header("Location: ../index.php");
?>