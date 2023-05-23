<?php

require_once "Model/sujetsModel.php";

$uri = $_SERVER['REQUEST_URI'];

if($uri === '/index.php' || $uri === '/'){
    $debats = RecupSujets($pdo);
    require_once "Templates/sujets/voirTousLesSujets.php";
}
elseif (str_contains($uri, '/sujet?debatId=')){
    if (isset($_POST['envoieNotes'])) {
        foreach($_POST['notePerso'] as $propositionId => $note) {

            ajoutNote($pdo, $propositionId, $note);
        }
    }

    $debat = RecupDonnesUnSujet($pdo);
    $propositions = AppelPropositions($pdo);
    require_once "Templates/sujets/sujetInterface.php";
}
//creation de debat
elseif($uri === "/creation-de-sujet"){
    $categories = RecupCategories($pdo);
    if(isset($_POST["envoieInfosSujet"])){
        createDebat($pdo);
        $_SESSION['debatId'] = $pdo->lastInsertId();

        foreach($_POST['CRsujetSujet'] as $sujet) {
            relieSujet($pdo, $sujet);
        }

        header('location:/ajout-propositions');
    }
    require_once "Templates/sujets/createSujet.php";
}
elseif($uri === "/ajout-propositions"){
    if(isset($_POST["confirmPropo"])){
        header('location:/');
        for ($i=1; $i <= 2; $i++) { 
            createProposition($pdo,$i);
            
        }
    }
    elseif(isset($_POST["ajoutPropo"])){
        header('location:/ajout-proposition');
        for ($i=1; $i <= 2; $i++) { 
            createProposition($pdo,$i);
            
        }
    }

    require_once "Templates/sujets/addProposition.php";
}
elseif($uri === "/ajout-proposition"){
    if(isset($_POST["confirmPropo"])){
        header('location:/');
        createProposition($pdo,'3');
    }
    elseif(isset($_POST["ajoutPropo"])){
        header('location:/ajout-proposition');
        createProposition($pdo,'3');
    }
    require_once "Templates/sujets/addSuppProposition.php";
}