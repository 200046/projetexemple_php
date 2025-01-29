<?php // Code php qui décide de ce qu'il faut donner comme valeur à la variable $template
// On ajoutera par la suite les require auc modèles 

// Récupération du chemin désiré
$uri = $_SERVER["REQUEST_URI"];
if ($uri === "/connexion") {
   // Vérifier si l'utilisateur a cliqué sur le bouton du form
   if (isset($_POST['btnEnvoi'])) {
      // Pour récupere l'erreur si l'utilisateur fait une faute de frappe
      $erreur = false;
      // Tentative de connexion et de récuperation des données de l'utilisateur
      if (connectUser($pdo)) {
         // Rédirection vers la page d'accueil
         header("location:/");
      }
   }
   $title = "Connexion";
   $template = "Views/Users/connexion.php";
   require_once("Views/base.php");
} elseif ($uri === "/deconnexion") {
   // À voir plus tard
} elseif ($uri === "/inscription") {
   if (isset($_POST['btnEnvoi'])) {
      // Vérif des données encodées
      $messageError = verifEmptyData();
      // S'il n'y a pas d'erreur
      if (!$messageError) {
         // Ajout de l'utilisateur à la base de données
         createUser($pdo);
         // Rédirection vers la page de connexion
         header("location:/connexion");
      }
   }
   $title = "Inscription";
   $template = "Views/Users/InscriptionOrEditProfile.php";
   require_once("Views/base.php");
}
