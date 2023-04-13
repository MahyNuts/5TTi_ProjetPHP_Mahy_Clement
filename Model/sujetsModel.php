<?php

function RecupTitreSujet($pdo)
{
    try {
        $query = "SELECT * FROM debat inner join users on debat.debatId = users.userId";
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute();
        $debats=$ajouteUser->fetchAll();
        return $debats;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function RecupDonnesUnSujet($pdo)
{
    try {
        $query = "SELECT * FROM debat inner join users on debat.debatId = users.userId where debatId = :debatId";
        $ajouteUser = $pdo->prepare($query);
        $ajouteUser->execute([
            'debatId' => $_GET["debatId"]
        ]);
        $debat=$ajouteUser->fetch();
        return $debat;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}