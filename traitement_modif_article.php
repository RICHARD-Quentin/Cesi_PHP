<?php
require 'article.php';
$article=new article($_POST);
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_php;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

$art_id=$_POST['monId'];
$art_contenu=$_POST['monContenu'];
$cat_id=$_POST['maCategorie'];

$article->modification($art_id,$art_contenu,$cat_id,$bdd);
header('Location: ./articles.php');

