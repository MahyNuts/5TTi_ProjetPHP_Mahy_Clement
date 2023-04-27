<form class="flex justify-content-center text-align-center" action="" method="post">
            <fieldset class="formulaire">
                <legend class="flex justify-content-center">Créer un débat</legend>
                <div class="inpl">
                    <label for="CRtitreSujet">Titre du débat</label>
                    <input type="text" id="CRtitreSujet" name="CRtitreSujet" class="input50">
                </div>
                <div class="inpl">
                    <label for="catégorie">Catégorie</label>
                    <br>
                    <select name="CRsujetSujet[]" id="CRsujetSujet" class="input50" multiple>
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