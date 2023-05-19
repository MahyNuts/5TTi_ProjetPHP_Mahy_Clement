<?php

require_once "Model/sujetsModel.php";

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/index.php' || $uri === '/'){
    $debats = RecupSujets($pdo);
    require_once "Templates/sujets/voirTousLesSujets.php";
}
elseif (str_contains($uri, '/sujet?debatId=')){
    $debat = RecupDonnesUnSujet($pdo);
    $propositions = AppelPropositions($pdo);
    require_once "Templates/sujets/sujetInterface.php";
}
elseif($uri === "/creation-de-sujet"){
    $categories = RecupCategories($pdo);
    if(isset($_POST["envoieInfosSujet"])){
        var_dump($_POST);
        // createDebat($pdo);
        $debatId = $pdo->lastInsertId();
        var_dump($debatId);
        header('location:/ajout-propositions');
    }
    require_once "Templates/sujets/createSujet.php";
}
elseif($uri === "/ajout-propositions"){
    if(isset($_POST["confirmPropo"])){
        header('location:/');
    }
    elseif(isset($_POST["ajoutPropo"])){
        header('location:/ajout-proposition');
    }
    require_once "Templates/sujets/addProposition.php";
}
elseif($uri === "/ajout-proposition"){
    if(isset($_POST["confirmPropo"])){
        header('location:/');
    }
    elseif(isset($_POST["ajoutPropo"])){
        header('location:/ajout-proposition');
    }
    require_once "Templates/sujets/addSuppProposition.php";
}