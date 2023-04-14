<?php

require_once "Model/sujetsModel.php";

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/index' || $uri === '/'){
    $debats = RecupTitreSujet($pdo);
    require_once "Templates/sujets/voirTousLesSujets.php";
}
elseif (str_contains($uri, '/sujet?debatId=')){
    $debat = RecupDonnesUnSujet($pdo);
    require_once "Templates/sujets/sujetInterface.php";
}