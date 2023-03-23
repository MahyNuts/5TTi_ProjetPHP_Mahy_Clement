
        <form action="" method="post">
            <fieldset>
                <legend>S'inscrire</legend>
                <div class="inpl">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" name="nom">
                    <?php if(isset($messageError["nom"])) : ?><small><?= $messageError["nom"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="prenom">Prénom</label>
                    <input type="text" id="prenom" name="prenom">
                    <?php if(isset($messageError["prenom"])) : ?><small><?= $messageError["prenom"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="pseudo">Pseudonyme</label>
                    <input type="text" id="pseudo" name="pseudo">
                    <?php if(isset($messageError["pseudo"])) : ?><small><?= $messageError["pseudo"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email">
                    <?php if(isset($messageError["email"])) : ?><small><?= $messageError["email"] ?></small><?php endif ?>
                </div>
                <div class="inpl">
                    <label for="motdepasse">Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe">
                    <?php if(isset($messageError["mot_de_passe"])) : ?><small><?= str_replace("_", " ", $messageError["mot_de_passe"]) ?></small><?php endif ?>
                </div>
                <button type="submit" name="envoieInfos">S'inscrire</button>
                <div>
                    <p><a href="connexion">Déjà inscrit ?</a></p>
                </div>
            </fieldset>
        </form>