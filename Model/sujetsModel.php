 <?php
 
function RecupSujets($pdo)
{
    try {
        $query = "select * from debat inner join users on debat.userId = users.userId";
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
        $query = "SELECT * FROM proposition WHERE debatId = :debatId;";
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
            'debatNote' => null,
            'userId' => $_SESSION["user"]->userId,
            'debatDate' => $dateActu
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function createProposition($pdo,$i)
{
    try{
        $query = 'insert into proposition(propositionNom, userId, propositionNoteTotale, debatId) values (:propositionNom, :userId, :propositionNoteTotale, :debatId)';
        $ajouteProposition = $pdo->prepare($query);
        $ajouteProposition->execute([
            'propositionNom' => $_POST['Proposition'.$i],
            'userId' => $_SESSION["user"]->userId,
            'propositionNoteTotale' => null,
            'debatId' => $_SESSION['debatId']

        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}
function relieSujet($pdo, $sujetId)
{
    try{
        $query = 'insert into debat_sujet(debatId, sujetId) values (:debatId, :sujetId)';
        $ajouteProposition = $pdo->prepare($query);
        $ajouteProposition->execute([
            'sujetId' => $sujetId,
            'debatId' => $_SESSION['debatId']
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function categorieDebat($pdo){
    try{
        $query = 'insert into debat_sujet(debatId, sujetId) values (:debatId, :sujetId)';
        $lierDebProp = $pdo->prepare($query);
        $lierDebProp->execute([
            'debatId' => $_POST('debatId'),
            'sujetId' => $_POST('')
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}

function ajoutNote($pdo, $propositionId, $note){
    try{
        $query = 'insert into note(noteDate, note, userId, debatId, propositionId) values (:noteDate, :note, :userId, :debatId, :propositionId)';
        $ajoutDeProp = $pdo->prepare($query);
        $ajoutDeProp->execute([
            'noteDate' => date("Y-m-d H:i:s"),
            'note' => $note,
            'userId' => $_SESSION["user"]->userId,
            'debatId' => $_GET['debatId'],
            'propositionId' => $propositionId
        ]);
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    } 
}
         
    

