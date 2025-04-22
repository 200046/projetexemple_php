<?php 
function selectAllSchool($pdo) {
    try {
        // Définition de la requête SQL
        $query = 'select * FROM school';
        // Préparation de l'éxécution de la requête
        $selectSchool = $pdo->prepare($query);
        // Excécution
        $selectSchool->execute();
        // Récupération des données dans l'objet fetch
        $schools = $selectSchool->fetchAll();
        // Renvoi des résultats
        return $schools;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
function deleteOptionsSchoolFromUser($dbh) 
{
    try {
        $query = 'delete from option_ecole wher schoolId in (select schoolId from school where utilisateurId = :utilisateurId)';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->exectute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function deleteAllSchoolsFromUser($pdo) {
    try {
        $query = 'delete from school where utilisateurId = :utilisateurId';
        $deleteAllSchoolsFromId = $pdo->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'utilisateurId' => $_SESSION["user"]->id
        ]);
    }
    catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}
?>