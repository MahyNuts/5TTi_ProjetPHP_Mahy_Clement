<?php

require_once "Model/usersModel.php";

$uri = $_SERVER['REQUEST_URI'];

if($uri === "/connexion"){
    // var_dump($_POST);
    if(isset($_POST["envoieInfos"])){
        // var_dump($_POST);
        connexionUser($pdo);
        header('location:/');
    }
    require_once "Templates/users/connexion.php";
}elseif($uri === "/inscriptionOrEditProfile") {
    if(isset($_POST["envoieInfos"])){
        $messageError = verifEmptyData();
        var_dump($messageError);
        if(!$messageError){
            createUser($pdo);
            header('location:/connexion');
        }
        
    }
    require_once "Templates/users/inscriptionOrEditProfile.php";
} elseif($uri === "/deconnexion") {
    session_destroy();
    header('location:/');
} elseif($uri === "/profil"){
    if(isset($_POST["envoieInfos"]))
    {
        UpdateUser($pdo);
        UpdateSession($pdo);
        header("location/profil");
    }
    elseif(isset($_POST["envoieSuppression"])){
        deleteAllUsersDebats($pdo);
        DeleteUser($pdo);
        session_destroy();
        header('location:/');
    }
    require_once "Templates/users/inscriptionOrEditProfile.php";
}

function verifEmptyData(){
    foreach($_POST as $key => $value){
        var_dump($key . ' => ' . $value);
        if (empty($value)){
            $messageError[$key] = "Votre " . $key . " est vide.";
        }
    }
    if(isset($messageError)){
        return $messageError;
    }else {
        return false;
    }
    
}