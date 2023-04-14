 <?php
 
function RecupTitreSujet($pdo)
{
    try {
        $query = "select * from debat inner join users on debat.debatId = users.userId";
        $recupTitre = $pdo->prepare($query);
        $recupTitre->execute();
        $debats=$recupTitre->fetchAll();
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

function AppelPropositions($pdo)
{
    try {
        $query = "SELECT * FROM proposition INNER JOIN debat_proposition ON proposition.propositionId = debat_proposition.propositionId where propositionId = :propositionId  INNER JOIN debat ON debat_proposition.debatId = debat.debatId where debatId = :debatId";
        $AppelProp = $pdo->prepare($query);
        $AppelProp->execute([
            'propositionId' => $_GET["propositionId"],
            'debatId' => $_GET["debatId"]
        ]);
        $proposition=$AppelProp->fetchAll();
        return $proposition;
    } catch (PDOException $e){
        $message = $e->getMessage();
        die($message);
    }
}