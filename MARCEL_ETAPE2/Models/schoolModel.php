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
?>