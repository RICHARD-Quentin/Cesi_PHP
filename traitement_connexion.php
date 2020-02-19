<?php
require 'utilisateur.php';
$user = new utilisateur($_POST);
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_php;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$user_login=$_POST['monPseudo'];
$user_password=$_POST['monMotDePasse'];

if (isset($user_login) && isset($user_password)){

    if (strlen($user_login)!=0 && strlen($user_password)!=0) {
        $user->connexion($user_login,$user_password,$bdd);
    }
    else {
        header('Location: ./erreur_connexion.php');
    }
}

else {
    header('Location: ./erreur_connexion.php');
}













































/*Form avec upload*/
/*
if (isset($_POST['monChamp']) && isset($_FILES['monFichier'])) {
    // Répertoire de destination
    $uploadDir = __DIR__ . '/upload/';
    // extension du fichier envoyé
    $extension = pathinfo($_FILES['monFichier']['name'])['extension'];
    // Nom du fichier à uploader
    $nomFichier = 'mon-super-fichier.' . $extension;

    // On procède à l'enregistrement du fichier
    if (move_uploaded_file($_FILES['monFichier']['tmp_name'], $uploadDir.$nomFichier)) {
        header('Location: ./succes.php');
    } else {
        header('Location: ./erreur.php');
    }

}
*/