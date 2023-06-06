<form method="post">
<div class="flex affSujetInt justify-content-space-around">
    <h1 class="grosTitre"><?= $debat->debatTitre ?></h1>
</div>
<div class="st flex justify-content-space-around">
    <div class="elementSujetAccueil flex center">
        PROPOSITIONS
    </div>
    <div class="elementSujetAccueil flex center">
        NOTE TOTALE
    </div>
    <div class="elementSujetAccueil flex center">
        VOTRE NOTE
    </div>
</div>
<?php foreach ($propositions as $proposition) : ?>
    <div class="st flex justify-content-space-around">
        <div class="elementSujetAccueil flex center">
            <?= $proposition->propositionNom ?>
        </div>
        <div class="elementSujetAccueil flex center">
            <?php if($proposition->propositionNoteTotale == 20) : ?>
                <p>Note non attribuée</p> 
            <?php else : ?>
                <?=$proposition->propositionNoteTotale?>
            <?php endif ?>
        </div>
        <div class="elementSujetAccueil flex center">
                <input type="number" name="notePerso[<?= $proposition->propositionId ?>]" class="notePerso" value="0" min="0" max="10" <?php if(!isset($_SESSION['user'])) : ?> disabled='disabled'<?php endif ?>>
        </div>
    </div>
<?php endforeach ?>
<div class="flex justify-content-space-around">
    <?php if(isset($_SESSION['user'])): ?><button type="submit" name="envoieNotes">Envoyer</button><?php endif ?>
</div>
</form>