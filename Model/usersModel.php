<?php

function createUser($pdo)
{
    try {
        $query = 'insert into users(userNom, userPrenom, userPseudo, userEmail, userMotdepasse) values (:userNom, :userPrenom, :userPseudo, :userEmail, :userMotdepasse)';
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'userNom' => htmlentities($_POST["nom"]),
            'userPrenom' => htmlentities($_POST["prenom"]),
            'userPseudo' => htmlentities($_POST["pseudo"]),
            'userEmail' => htmlentities($_POST["email"]),
            'userMotdepasse' => htmlentities($_POST["mot_de_passe"])
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
            'userEmail' => htmlentities($_POST["email"]),
            'userMotdepasse' => htmlentities($_POST["mot_de_passe"])
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
            'userNom' => htmlentities($_POST["nom"]),
            'userPrenom' => htmlentities($_POST["prenom"]),
            'userPseudo' => htmlentities($_POST["pseudo"]),
            'userMotdepasse' => htmlentities($_POST["mot_de_passe"]),
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
        // $query = "update users set userNom = null where userId =: id";
        // $deleteUser = $pdo->prepare($query);
        // $deleteUser->execute([
        //     'userId' => $_SESSION["user"]->id
        // ]);
        // $query = "update users set userPrenom = null where userId =: id";
        // $deleteUser = $pdo->prepare($query);
        // $deleteUser->execute([
        //     'userId' => $_SESSION["user"]->id
        // ]);
        // $query = "update users set userEmail = null where userId =: id";
        // $deleteUser = $pdo->prepare($query);
        // $deleteUser->execute([
        //     'userId' => $_SESSION["user"]->id
        // ]);
        // $query = "update users set userMotdepasse = null where userId =: id";
        // $deleteUser = $pdo->prepare($query);
        // $deleteUser->execute([
        //     'userId' => $_SESSION["user"]->id
        // ]);
        // $query = "update users set userPseudo = 'Utilisateur supprimé' where userId =: id";
        // $deleteUser = $pdo->prepare($query);
        // $deleteUser->execute([
        //     'userId' => $_SESSION["user"]->id
        // ]);
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
}

function deleteAllUsersDebats($pdo){
    try{
        $query = "delete from debat where userId =: id";
        $deleteUser = $pdo->prepare($query);
        $deleteUser->execute([
            'userId' => $_SESSION["user"]->id
        ]);
        $query = "delete from note where userId =: id";
        $deleteUser = $pdo->prepare($query);
        $deleteUser->execute([
            'userId' => $_SESSION["user"]->id
        ]);
        $query = "delete from sujet where userId =: id";
        $deleteUser = $pdo->prepare($query);
        $deleteUser->execute([
            'userId' => $_SESSION["user"]->id
        ]);
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
}

function appelUsers($pdo){
    try{
        $query = "select * from users where userId != :userId";
        $recupUsers = $pdo->prepare($query);
        $recupUsers->execute([
            'userId' => $_SESSION["user"]->userId
        ]);
        $users=$recupUsers->fetchAll();
        return $users;
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
    
}

function creerConversation($pdo){
    try{
        $query = "insert into conversation (conversationType) values (:conversationType)";
        $creerConv = $pdo->prepare($query);
        $creerConv->execute([
            'conversationType' => "binaire"
        ]);
        $query = "insert into utilisateur_conversationId (conversationId, userId) values (:conversationId, :userId)";
        $lierUserConv = $pdo->prepare($query);
        $lierUserConv->execute([
            'conversationId' => $_GET['conversationId'],
            'userId' => $_SESSION["user"]->userId
        ]);
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
}

function envoyerMessage($pdo){
    try{
        $query = "insert into message (messageText, messageDate, messageHeure, conversationId, userId) values (:messageText, :messageDate, :messageHeure, :conversationId, :userId)";
        $creerMessage = $pdo->prepare($query);
        $creerMessage->execute([
            'messageText' => htmlentities($_POST["message"]),
            'messageDate' => date("Y-m-d H:i:s"),
            'messageHeure' => time(),
            'conversationId' => $_GET["conversationId"],
            'userId' => $_GET["userId"]
        ]);
    } catch(PDOExeption $e){
        $message = $e->getMessage();
        die($message);
    }
}


    