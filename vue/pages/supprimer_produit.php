<?php

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['valeur_id'])) {
    // Vérifier si le panier_id est passé via POST
    if (isset($_POST['panier_id'])) {
        $panier_id = $_POST['panier_id'];

        // Récupérer l'ID de l'utilisateur
        $utilisateur_id = $_SESSION['valeur_id'];

        try {
            // Préparer la requête pour supprimer le produit du panier
            $stmt = $bdd->prepare("DELETE FROM panier WHERE id = ? AND utilisateur_id = ?");
            $stmt->execute([$panier_id, $utilisateur_id]);

            // Vérifier si la suppression a été effectuée
            if ($stmt->rowCount() > 0) {
                // Rediriger vers la page du panier avec un message de succès
                header("Location: panier.php?message=produit_supprime");
                exit();
            } else {
                // Si rien n'a été supprimé, rediriger avec un message d'erreur
                header("Location: panier.php?message=erreur_suppression");
                exit();
            }
        } catch (PDOException $e) {
            // En cas d'erreur avec la base de données
            echo "Erreur: " . $e->getMessage();
        }
    } else {
        // Si pas d'ID du panier fourni
        header("Location: panier.php?message=erreur_panier_id");
        exit();
    }
} else {
    // Si l'utilisateur n'est pas connecté
    header("Location: connexion.php");
    exit();
}
