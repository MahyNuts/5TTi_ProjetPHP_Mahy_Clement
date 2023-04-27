<div class="flex justify-content-space-around recherche">
        <div class="search flex">
            <input type="text" id="recherche">
            <button class="rech" id="recherche">
                Rechercher
            </button>
        </div>
        <?php if (isset($_SESSION["user"])) : ?>
            <div class="flex">
                <a href="/creation-de-sujet" class="menuA">
                        Créer un débat
                </a>
            </div>
        <?php endif ?>
</div>
<div class="st flex justify-content-space-around">
        <div class="elementSujetAccueil flex center">
            <p>TITRE</p>
        </div>
        <div class="elementSujetAccueil flex center">
            <p>CREATEUR</p>
        </div>
        <div class="elementSujetAccueil flex center">
            <p>DATE DE CREATION</p>
        </div>
</div>

<?php foreach ($debats as $debat) : ?>

<a href="sujet?debatId=<?= $debat->debatId ?>">
    <div class="sujet flex justify-content-space-around">
        <div class="elementSujetAccueil flex center">
            <p class="uppercase"><?= $debat->debatTitre ?></p>
        </div>
        <div class="elementSujetAccueil flex center">
            <p><?= $debat->userPseudo ?></p>
        </div>
        <div class="elementSujetAccueil flex center">
            <p><?= $debat->debatDate ?></p>
        </div>
    </div>
</a>

<?php endforeach ?>