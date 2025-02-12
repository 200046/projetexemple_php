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

function createUser($pdo) {
    try {
        // Définition de la requête d'insertion
        $query = 'insert into utilisateur{nomUser, prenomUser, loginUser, passWordUser emailUser, role}
        values (:nomUser, :prenomUser, :loginUser, :passWordUser, :emailUser, :role)';
        // Préparation de la requête
        $ajouterUser = $pdo->prepare($query);
        // Execution en attribuant les valeurs récupérées
        $ajouterUser->execute([
            'nomUser' => $_POST["nom"],
            'prenomUser' => $_POST["prenom"],
            'loginUser' => $_POST["login"],
            'passWordUser' => $_POST["mot_de_passe"],
            'emailUser' => $_POST["email"],
            'role' => 'user'
        ]);
    } 
    catch (PDOException $e) {
        $message = $e->getMessage();
        die($message);
    }
}

function verifEmptyData() {
    // Parcours du tableau $_POST
    foreach($_POST as $key => $value) {
        // str-remplace remplace une chaine par une autre chaine donnée
        if (empty(str_replace(' ', '', $value))) {
            // On rempli un tableau associatif
            $messageError[$key] = "Votre " . $key . " est vide";
        }
    }
    if (isset($messageError)) {
        return $messageError;
    } else {
        return false;
    }
}
?>