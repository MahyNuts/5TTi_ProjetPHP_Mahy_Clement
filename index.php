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
    <title>WBR - Accueil</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="icon" href="images/WBR.png">
</head>
<body>
    <header>
        
        <div class="menu flex justify-content-space-around">
            <div class="menug flex justify-content-center">
                <li class="menuLi">
                    <a href="index.php" class="menuA">
                        Accueil
                    </a>
                </li>
            </div>
            <div class="menuC flex justify-content-center">
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
            <!-- <div class="menuC flex justify-content-center">
                <li class="menuLi">
                    <div class="search flex">
                        <input type="text" id="recherche">
                        <button class="rech" id="recherche">
                            Rechercher
                        </button>
                    </div>
                </li>
            </div> -->
            <div class="menuD flex justify-content-center">
                <li class="menuLi">
                    <a href="profil" class="menuA">
                        Profil
                    </a>
                </li>
            </div>
        </div>
    </header>
    <?php
        require_once "Controller/sujetsController.php";
        require_once "Controller/usersController.php";
        // var_dump($_SESSION);
    ?>
</body>
</html>

