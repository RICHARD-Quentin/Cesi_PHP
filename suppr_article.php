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

$art_id=$_GET['art_id'];


$article->suppression($art_id,$bdd);
header('Location: ./articles.php');
