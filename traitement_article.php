<?php
session_start();
require 'article.php';
$article = new article($_POST);
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_php;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$path=__DIR__;
$art_titre=$_POST['monTitre'];
$art_categorie=(int)$_POST['maCategorie'];
$art_contenu=$_POST['monContenu'];
$art_image=$_FILES['monImage'];
$art_auteur=(int)$_SESSION['user_id'];
$art_image_path= $article->image($path,$art_image);

$art_url= $article->url($art_titre);
var_dump($art_url);


var_dump($art_image_path);
if (isset($art_titre) && isset($art_categorie) && isset($art_image) && isset($art_contenu)){

    if (strlen($art_titre)!=0
        && strlen($art_contenu)!=0){

        $article->publication($art_titre,$art_contenu,$art_image_path,$art_categorie,$art_auteur,$art_url,$bdd);
    }


    else {
        header('Location: ./erreur.php');
    }
}

else {
    header('Location: ./erreur.php');
}
