<?php

function createUser($pdo)
{
    try {
        $query = 'insert into utilisateurs(nom, prenom, pseudo, email, motdepasse) values (:nom, :prenom, :pseudo, :email, :motdepasse)';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'pseudo' => $_POST["pseudo"],
            'email' => $_POST["email"],
            'motdepasse' => $_POST["mot_de_passe"]
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }

}

function connexionUser($pdo)
{
    try {
        $query = "select * from utilisateurs where email = :email and motdepasse = :motdepasse";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'email' => $_POST["email"],
            'motdepasse' => $_POST["mot_de_passe"]
        ]);
        $user = $connectUser->fetch();
        if($user){
            $_SESSION['user'] = $user;
        }
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function UpdateUser($pdo){
    try{
        $query = "update utilisateurs set nom = :nom, prenom = :prenom, pseudo = :pseudo, motdepasse = :motdepasse where utilisateurId = :utilisateurId";
        $updateUser = $pdo->prepare($query);
        $updateUser->execute([
            'nom' => $_POST["nom"],
            'prenom' => $_POST["prenom"],
            'pseudo' => $_POST["pseudo"],
            'motdepasse' => $_POST["mot_de_passe"],
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
    }catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function UpdateSession($pdo)
{
    try {
        $query = "select * from utilisateurs where utilisateurId = :utilisateurId";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'utilisateurId' => $_SESSION["user"]->utilisateurId
        ]);
        $user = $connectUser->fetch();
        $_SESSION['user'] = $user;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

    


    