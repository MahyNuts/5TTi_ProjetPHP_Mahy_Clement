<?php

function RecupTitreSujet($pdo)
{
    try {
        $query = 'select debatTitre from debat (userNom, userPrenom, userPseudo, userEmail, userMotdepasse) values (:userNom, :userPrenom, :userPseudo, :userEmail, :userMotdepasse)';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'userNom' => $_POST["nom"],
            'userPrenom' => $_POST["prenom"],
            'userPseudo' => $_POST["pseudo"],
            'userEmail' => $_POST["email"],
            'userMotdepasse' => $_POST["mot_de_passe"]
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }

}