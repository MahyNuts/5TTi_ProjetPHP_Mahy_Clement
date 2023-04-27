 <?php
 
function RecupSujets($pdo)
{
    try {
        $query = "select * from debat inner join users on debat.debatId = users.userId";
        $recupSujets = $pdo->prepare($query);
        $recupSujets->execute();
        $debats=$recupSujets->fetchAll();
        return $debats;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function RecupDonnesUnSujet($pdo)
{
    try {
        $query = "select * from debat inner join users on debat.debatId = users.userId where debatId = :debatId";
        $recupDonnes = $pdo->prepare($query);
        $recupDonnes->execute([
            'debatId' => $_GET["debatId"]
        ]);
        $debat=$recupDonnes->fetch();
        return $debat;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function RecupCategories($pdo)
{
    try{
        $query = "select * from sujet";
        $recupCat = $pdo->prepare($query);
        $recupCat->execute();
        $categories=$recupCat->fetchAll();
        return $categories;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function AppelPropositions($pdo)
{
    try {
        $query = "SELECT * FROM proposition INNER JOIN debat_proposition ON proposition.propositionId = debat_proposition.propositionId INNER JOIN debat ON debat.debatId = debat_proposition.debatId WHERE debat.debatId = :debatId;";
        $AppelProp = $pdo->prepare($query);
        $AppelProp->execute([
            'debatId' => $_GET["debatId"]
        ]);
        $propositions=$AppelProp->fetchAll();
        return $propositions;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createDebat($pdo)
{
    try {
        $dateActu = date("Y-m-d");
        $query = 'insert into debat(debatTitre, debatNote, userId, debatDate) values (:debatTitre, :debatNote, :userId, :debatDate)';
        $ajouteSujet = $pdo->prepare($query);
        $ajouteSujet->execute([
            'debatTitre' => $_POST["CRtitreSujet"],
            'debatNote' => 0,
            'userId' => $_SESSION["user"]->userId,
            'debatDate' => $dateActu
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createProposition($pdo)
{
    try{
        $query = 'insert into proposition(propositionNom, userId, propositionNoteTotale) values (:propositionNom, :userId, :propositionNoteTotale)';
        $ajouteProposition = $pdo->prepare($query);
        $ajouteProposition->execute([
            'propositionNom' => $_POST['CRpropositionSujet'],
            'userId' => $_SESSION["user"]->userId,
            'propositionNoteTotale' => null
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function lierDebatProposition($pdo){
    try{
        $query = 'insert into debat_proposition(debatId, propositionId) values (:debatId, :propositionId)';
        $lierDebProp = $pdo->prepare($query);
        $lierDebProp->execute([
            'debatId' => $_POST('debatId') ,
            'propositionId' => $_POST('propositionId')
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function catégorieDebat($pdo){
    try{
        $query = 'insert into debat_sujet(debatId, sujetId) values (:debatId, :sujetId)';
        $lierDebProp = $pdo->prepare($query);
        $lierDebProp->execute([
            'debatId' => $_POST('debatId') ,
            'sujetId' => $_POST('')
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

         
    

