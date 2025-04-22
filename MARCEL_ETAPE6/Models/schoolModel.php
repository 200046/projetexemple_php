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

/**
 * Fonction selectMySchools
 * -----------------------
 * BUT : Aller rechercher les caractéristiques des écoles de l'utilisateur connecté dans la base de données
 * IN : $pdo reprenant toutes les informations de connexion
 * OUT : objet pdo contenant les écoles de l'utilisateur connecté de la base de données
 */
function selectMySchools($pdo)
{
    try {
        //requête avec critère et paramètre !
        $query = 'select * from school where utilisateurId = :utilisateurId';
        $selectSchool = $pdo->prepare($query);
        $selectSchool->execute([
            //le paramètre est l'id de l'utilisateur connecté
            'utilisateurId' => $_SESSION["user"]->id
        ]);
        $schools = $selectSchool->fetchAll();
        return $schools;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

/**
 * Fonction selectAllOptions
 * --------------------------
 * BUT : aller rechercher les caractéristiques de toutes les options disponibles dans la base de données
 * IN : $pdo reprenant toutes les informations de connexion
 * OUT : objet pdo contenant la liste de toutes les options existantes de la base de données
 */
function selectAllOptions($pdo)
{
    try {
        $query = 'SELECT * FROM optionscolaire';
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute();
        $options = $selectOptions->fetchAll();
        return $options;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}