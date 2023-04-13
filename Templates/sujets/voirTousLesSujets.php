<div class="colonne flex justify-content-space-around">
    <li>TITRE</li>
    <li>CREATEUR</li>
    <li>DATE DE CREATION</li>
</div>

<?php foreach ($debats as $debat) : ?>

<a href="sujet?debatId=<?= $debat->debatId ?>">
    <div class="sujet flex justify-content-space-around">
        <div class="NomSujet flex">
            <p><?= $debat->debatTitre ?></p>
        </div>
        <div class="CreateurSujet flex">
            <p><?= $debat->userPseudo ?></p>
        </div>
        <div class="DateSujet flex">
            <p><?= $debat->debatDate ?></p>
        </div>
    </div>
</a>
<?php endforeach ?>