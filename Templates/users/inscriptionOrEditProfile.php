
    <form class="flex justify-content-center text-align-center" action="" method="post">
            <fieldset class="formulaire">
                <legend>S'inscrire</legend>
                <div class="inpl">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom" value="<?php if (isset($_SESSION["user"])) : ?><?=$_SESSION["user"]->userNom ?><?php endif ?>">
                    <?php if(isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom" value="<?php if (isset($_SESSION["user"])) : ?><?=$_SESSION["user"]->userPrenom ?><?php endif ?>">
                    <?php if(isset($messageError["prenom"])) : ?><small><?= $messageError["prenom"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="pseudo">Pseudonyme</label>
                    <input type="text" id="pseudo" name="pseudo" value="<?php if (isset($_SESSION["user"])) : ?><?=$_SESSION["user"]->userPseudo ?><?php endif ?>">
                    <?php if(isset($messageError["pseudo"])) : ?><small><?= $messageError["pseudo"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" <?php if (isset($_SESSION["user"])) : ?>disabled=disabled<?php endif ?> value="<?php if (isset($_SESSION["user"])) : ?><?=$_SESSION["user"]->userEmail ?><?php endif ?>">
                    <?php if(isset($messageError["email"])) : ?><small><?= $messageError["email"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="<?php if(isset($_SESSION["user"])) : ?>text<?php else : ?>password<?php endif ?>" id="mot_de_passe" name="mot_de_passe" value="<?php if(isset($_SESSION["user"])) : ?><?=$_SESSION["user"]->userMotdepasse ?><?php endif ?>">
                    <?php if(isset($messageError["mot_de_passe"])) : ?><small><?= str_replace("_", " ", $messageError["mot_de_passe"]) ?></small><?php endif ?>
                </div>
                <button type="submit" name="envoieInfos" value="inscrire"><?php if(isset($_SESSION["user"])) : ?>Modifier<?php else : ?>S'inscrire<?php endif ?></a></button>
                <div>
                <?php if(!isset($_SESSION["user"])) : ?><p><a href="connexion">Déjà inscrit ?</p><?php endif ?>
                    
                </div>
            </fieldset>
        </form>
        