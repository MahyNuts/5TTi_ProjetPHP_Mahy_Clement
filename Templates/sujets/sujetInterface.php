
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
</div>
<?php foreach ($propositions as $proposition) : ?>
    <div class="st flex justify-content-space-around">
        <div class="elementSujetAccueil flex center">
            <?= $proposition->propositionNom ?>
        </div>
        <div class="elementSujetAccueil flex center">
            <?= $proposition->propositionNoteTotale ?>  
        </div>
    </div>
<?php endforeach ?>