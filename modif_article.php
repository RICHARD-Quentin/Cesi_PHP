<?php include __DIR__ . '/header.php';
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cours_php;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
<?php $req = $bdd->prepare("SELECT art_id, art_titre, art_contenu FROM article art
WHERE art.art_id=:art_id
");
$req->execute(array(
   "art_id"=>$_GET['art_id']
));
$donnee = $req->fetchAll(PDO::FETCH_CLASS);
?>
        <div>
            <div>
                <h1 class="border-bottom w-100">Publication d'article</h1>
                <form action="traitement_modif_article.php" method="post" enctype="multipart/form-data" class="col-md-4">
                    <input class="form-control" id="monId" name="monId" value="<?php echo $donnee[0]->art_id;?>" hidden>

                    <div class="form-group">
                        <label for="Titre">Titre</label>
                        <input class="form-control" id="monTitre" name="monTitre" value="<?php echo $donnee[0]->art_titre;?>" disabled>

                    </div>

                    <div class="form-group">
                        <label for="maCategorie">Catégorie</label><br>
                        <select name="maCategorie" id="maCategorie">
                            <?php
                            $i=0;
                            $stmt = $bdd -> query("SELECT * FROM categorie");
                            $cat_name=$stmt->fetchAll(PDO::FETCH_CLASS);
                                    foreach ($cat_name as $cat){
                                      echo '<option value="' . $cat->cat_id . '">' . $cat->cat_nom . '</option>';
                                    }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="monContenu">Contenu</label><br>
                        <textarea class="form-control" id="monContenu" name="monContenu" rows="5" cols="33" ><?php echo $donnee[0]->art_contenu;?></textarea>

                    </div>

                    <input type="submit" value="Publier la modification !">
                </form>
            </div>
        </div>
    </main>
<?php include __DIR__ . '/footer.php' ?>