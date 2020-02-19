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

if (isset($_POST['monPseudo']) && isset($_POST['monMotDePasse']) && isset($_POST['monMail'])){

    if (filter_var($_POST['monMail'],FILTER_VALIDATE_EMAIL)
        && strlen($_POST['monPseudo'])!=0
        && strlen($_POST['monMotDePasse'])!=0) {
        $user->inscription($_POST['monPseudo'],$_POST['monMotDePasse'],$bdd);
    }


    else {
        header('Location: ./erreur.php');
    }
}

else {
    header('Location: ./erreur.php');
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