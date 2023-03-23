<?php
    require_once "Config/databaseConnexion.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBR - Accueil</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="images/WBR.png">
</head>

<?php
$utilisateur = "user";
$parti = 2;
$nomSujet = "Sujet";

if($parti > 1)
{
    $partiPh = "participants";
}
else
{
    $partiPh = "participant";
}
?>
<body>
    <div class="sujet flex justify-content-space-around">
        <div class="nomSujet flex">
            <p><a href=""><?=$nomSujet?></a></p>
        </div>
        <div class="nomUtilisateur flex">
            <p>Créé par <a href=""><?=$utilisateur?></a></p>
            
        </div>
        <div class="nbreParticipants flex">
            <p><?=$parti?> <?=$partiPh?></p>
        </div>
    </div>
    <footer>
        <p>Pied de page</p>
    </footer>
</body>

</html>

