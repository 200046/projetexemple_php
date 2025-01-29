<?php 
function connectUser($pdo) {
    try {
        // Définition de la requête select en utilisant la notion de paramètre
        $query = 'select * FROM utilisateur where loginUser = :loginUser and passWordUser = :passWordUser';
        // Préparation de la requête
        $connectUser = $pdo->prepare($query);
        // Execution en attribuant les valeurs récuperées 
        $connectUser->execute([
            'loginUser' => $_POST['login'],
            'passWordUser' => $_POST['mot_de_passe']
        ]);
        // Stockage des données trouvées dans la variable $user 
        $user = $connectUser->fetch();
        if (!$user) {
            return false;
        } else {
            $_SESSION["user"] = $user;
            return true;
        }
        
    } catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
}}
?>