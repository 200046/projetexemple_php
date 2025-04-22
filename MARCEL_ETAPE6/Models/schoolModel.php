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


/**
 * Fonction selectOneSchool
 * ------------------------
 * BUT : aller rechercher les caractéristiques de l'école active dans la base de données
 * IN : $pdo reprenant toutes les informations de connexion
 * OUT : objet pdo contenant toutes les informations concernant l'école active
 */
function selectOneSchool($pdo)
{
    try {
        $query = 'select * from school where schoolId = :schoolId';
        $selectSchool = $pdo->prepare($query);
        $selectSchool->execute([
            'schoolId' => $_GET["schoolId"] // récupération du paramètre se trouvant dans l'adresse
        ]);
        $school = $selectSchool->fetch(); // récupération d'un enregistrement (pas fetchAll)
        return $school;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


/**
 * Fonction selectOptionsActiveSchool
 * ---------------------------------
 * BUT : aller rechercher dans la base de données les caractéristiques des options de l'école affichée
 * IN : $pdo reprenant toutes les informations de connexion
 * OUT : objet pdo contenant la liste des options de l'école affichée
 */
function selectOptionsActiveSchool($pdo)
{
    try {
        $query = 'select * from optionscolaire where optionScolaireId in (select optionScolaireId from option_ecole where schoolId = :schoolId)';
        $selectOptions = $pdo->prepare($query);
        $selectOptions->execute([
            'schoolId' => $_GET["schoolId"]
        ]);
        $options = $selectOptions->fetchAll();
        return $options;
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


/**
 * Fonction updateSchool
 * ----------------------
 * BUT : mettre à jour les données de l'école active dans la table school
 * IN : $dbh reprenant toutes les informations de connexion
 */
function updateSchool($dbh)
{
    try {
        $query = 'update school set schoolNom = :schoolNom, schoolAdresse = :schoolAdresse, schoolVille = :schoolVille, schoolCodePostal = :schoolCodePostal, schoolNumero = :schoolNumero, schoolImage = :schoolImage where schoolId = :schoolId';
        $updateSchoolFromId = $dbh->prepare($query);
        $updateSchoolFromId->execute([
            'schoolNom' => $_POST["nom"],
            'schoolAdresse' => $_POST["adresse"],
            'schoolVille' => $_POST["ville"],
            'schoolCodePostal' => $_POST["code_postal"],
            'schoolNumero' => $_POST["numero_telephone"],
            'schoolImage' => $_POST["image"],
            'schoolId' => $_GET["schoolId"] //école active
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}


/**
 * Fonction deleteOptionSchool
 * ---------------------------
 * BUT : supprimer les options de l'école active dans la table options
 * IN : $pdo reprenant toutes les informations de connexion
 */
function deleteOptionSchool($dbh, $schoolId)
{
    try {
        $query = 'delete from option_ecole where schoolId = :schoolId';
        $deleteAllSchoolsFromId = $dbh->prepare($query);
        $deleteAllSchoolsFromId->execute([
            'schoolId' => $schoolId //école active
        ]);
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

