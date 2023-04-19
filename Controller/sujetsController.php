<?php

require_once "Model/sujetsModel.php";

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/index.php' || $uri === '/'){
    $debats = RecupTitreSujet($pdo);
    require_once "Templates/sujets/voirTousLesSujets.php";
}
elseif (str_contains($uri, '/sujet?debatId=')){
    $debat = RecupDonnesUnSujet($pdo);
    $propositions = AppelPropositions($pdo);
    require_once "Templates/sujets/sujetInterface.php";
}
elseif($uri === "/creation-de-sujet"){
    require_once "Templates/sujets/createSujet.php";
    if(isset($_POST["envoieInfosSujet"])){
        createSujet($pdo);
        createProposition($pdo);
    }
}