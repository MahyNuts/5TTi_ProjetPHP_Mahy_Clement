
<div class="flex affSujetInt justify-content-space-around">
    <h1><?= $debat->debatTitre ?></h1>
</div>
<?php foreach ($proposition as $proposition) : ?>
    <p>
        <?= $proposition->$propositionNom ?>
    </p>

<?php endforeach ?>