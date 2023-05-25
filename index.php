<?php
    session_start();
    require_once "Config/databaseConnexion.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WBR</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="images/WBR.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&family=Sedgwick+Ave+Display&family=Shadows+Into+Light&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="menu flex justify-content-space-around">
            <div class="menug flex">
                <li class="menuLi">
                    <a href="/" class="menuA">
                        Accueil
                    </a>
                </li>
            </div>
            <div class="flex">
                <li class="menuLi">
                    <?php if(isset($_SESSION['user'])) : ?>
                        <a href="deconnexion" class="menuA">
                            Se déconnecter
                        </a>
                    <?php else : ?>
                        <a href="connexion" class="menuA">
                            Se connecter
                        </a>
                    <?php endif ?>
                </li>
            </div>
            <?php if (isset($_SESSION["user"])) : ?>
                <div class="flex">
                    <li class="menuLi">               
                        <a href="profil" class="menuA">
                            Profil
                        </a>
                    </li>
                </div>
            <?php endif ?>
            <?php if (isset($_SESSION["user"])) : ?>
                <div class="flex">
                    <li class="menuLi">               
                        <a href="discuter" class="menuA">
                            Discuter
                        </a>
                    </li>
                </div>
            <?php endif ?>
        </div>
    </header>
    <main>
    <?php
        require_once "Controller/sujetsController.php";
        require_once "Controller/usersController.php";
    ?>
    </main>
    
</body>
</html>

