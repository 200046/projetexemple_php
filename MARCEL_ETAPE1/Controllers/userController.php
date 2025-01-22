<?php // Code php qui décide de ce qu'il faut donner comme valeur à la variable $template
 // On ajoutera par la suite les require auc modèles 

 // Récupération du chemin désiré
 $uri = $_SERVER["REQUEST_URI"];
 var_dump($uri);
 if ($uri === "/connexion") {
    var_dump("coucou");
    $title = "Connexion";
    $template = "Views/Users/connexion.php";
    require_once("Views/base.php");
 }
 elseif ( $uri === "/deconnexion") {
    // À voir plus tard
 }
 elseif ($uri === "/inscription") {
    $title = "Inscription";
    $template = "Views/Users/InscriptionOrEditProfile.php";
    require_once("Views/base.php");
 }
?>