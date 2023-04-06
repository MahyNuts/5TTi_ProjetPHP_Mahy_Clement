<?php

function createUser($pdo)
{
    try {
        $query = 'insert into users(userNom, userPrenom, userPseudo, userEmail, userMotdepasse) values (:userNom, :userPrenom, :userPseudo, :userEmail, :userMotdepasse)';
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

function connexionUser($pdo)
{
    try {
        $query = "select * from users where userEmail = :userEmail and userMotdepasse = :userMotdepasse";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'userEmail' => $_POST["email"],
            'userMotdepasse' => $_POST["mot_de_passe"]
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
        $query = "update users set userNom = :userNom, userPrenom = :userPrenom, userPseudo = :userPseudo, userMotdepasse = :userMotdepasse where userId = :userId";
        $updateUser = $pdo->prepare($query);
        $updateUser->execute([
            'userNom' => $_POST["nom"],
            'userPrenom' => $_POST["prenom"],
            'userPseudo' => $_POST["pseudo"],
            'userMotdepasse' => $_POST["mot_de_passe"],
            'userId' => $_SESSION["user"]->userId
        ]);
    }catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function UpdateSession($pdo)
{
    try {
        $query = "select * from users where userId = :userId";
        $connectUser = $pdo->prepare($query);
        $connectUser->execute([
            'userId' => $_SESSION["user"]->userId
        ]);
        $user = $connectUser->fetch();
        $_SESSION['user'] = $user;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function DeleteUser($pdo){
    try{
        $query = "delete from users where userId =: id";
        $deleteUser = $pdo->prepare($query);
        $deleteUser->execute([
            'userId' => $_SESSION["user"]->id
        ]);
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
}

    


    