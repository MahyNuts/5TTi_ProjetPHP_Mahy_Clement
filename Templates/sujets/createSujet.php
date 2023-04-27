<form class="flex justify-content-center text-align-center" action="" method="post">
            <fieldset class="formulaire">
                <legend class="flex justify-content-center">Créer un sujet</legend>
                <div class="inpl">
                    <label for="CRtitreSujet">Titre du sujet</label>
                    <input type="text" id="CRtitreSujet" name="CRtitreSujet" class="input50">
                </div>
                <div class="inpl">
                    <label for="proposition">Proposition</label>
                    <input type="text" id="CRpropositionSujet" name="CRpropositionSujet" class="input50"> 
                </div>
                <div class="inpl">
                    <label for="catégorie">Catégorie</label>
                    <br>
                    <select name="CRsujetSujet" id="CRsujetSujet" class="input50">
                        <?php foreach($categories as $categorie) : ?>
                            <option class="input50" value="<?= $categorie->sujetId ?>"><?= $categorie->sujetNom ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="inpl">
                    <button type="submit" name="envoieInfosSujet">Créer</button>
                </div>
            </fieldset>
        </form>