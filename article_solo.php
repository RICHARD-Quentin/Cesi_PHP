<?php include __DIR__ . '/header.php';
require 'article.php';
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_php;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
$art_url=$_GET['url']
?>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <?php
        $req = $bdd->prepare("SELECT art.art_id, art.art_titre, art.art_contenu, art.art_image, art.art_datePublication, art.art_url, cat.cat_nom, uti.user_id ,uti.user_login FROM article art
INNER JOIN categorie cat
ON cat.cat_id = art.cat_id
INNER JOIN utilisateur uti
ON uti.user_id = art.user_id
WHERE art.art_url=:art_url
");
$req->execute(array(
    'art_url'=>$art_url
));
        $donnee = $req->fetchAll(PDO::FETCH_CLASS);
        foreach ($donnee as $article) {?>
            <!-- Heading Row -->
            <div class="row align-items-center my-5 shadow-sm" style="height: 250px;">
                <div class="col-lg-3 p-0">
                    <img class="img-fluid rounded p-0 mb-4 mb-lg-0 mh-100" src="<?php echo $article->art_image;  ?>" alt="">
                </div>
                <!-- /.col-lg-8 -->
                <div class="col-lg-8">
                    <h2 class="font-weight-light"><?php echo $article->art_titre;  ?></h2>
                    <h5><?php echo $article->cat_nom;  ?></h5>
                    <p><?php echo $article->art_contenu;  ?></p>
                    <small class="text-muted"><?php echo 'Posté le ' . $article->art_datePublication . ' par ' . $article->user_login  ;  ?></small>
                    <?php if(isset($_SESSION['user_login']) && isset($_SESSION['user_password']) && $_SESSION['user_id']==$article->user_id){?>
                        <div>
                            <br>
                            <a href="modif_article.php?art_id=<?php echo $article->art_id ?>"><button type="button" class="btn btn-outline-primary btn-sm">Modifier </button></a>
                            <a href="suppr_article.php?art_id=<?php echo $article->art_id ?>"><button type="button" class="btn btn-outline-danger btn-sm">Supprimer</button></a>
                        </div>
                    <?php } ?>

                </div>
            </div>

        <?php } ?>
    </main>
<?php include __DIR__ . '/footer.php' ?>