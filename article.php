<?php


class article
{
    public function image($path,$file){
        $i=1;
        $img_directory='img';
        $ext=pathinfo($file['name'],PATHINFO_EXTENSION);
        while(file_exists("$path\\$img_directory\\image($i).$ext"))
        {
            $i++;
        }
        move_uploaded_file($file['tmp_name'],"$path\\$img_directory\\image($i).$ext");
        $art_image_path="$img_directory/image($i).$ext";
        return $art_image_path;
    }

    public function publication($art_titre,$art_contenu,$art_image_path,$art_categorie,$art_auteur,$art_url,$bdd){
        $req = $bdd->prepare("INSERT INTO article(art_titre , art_contenu, art_image, cat_id, user_id, art_url) VALUES (:art_titre , :art_contenu, :art_image, :cat_id, :user_id, :art_url)");
            $req->execute(array(
                'art_titre'=>$art_titre,
                'art_contenu'=>$art_contenu,
                'art_image'=>$art_image_path,
                'cat_id'=>$art_categorie,
                'user_id'=>$art_auteur,
                'art_url'=>$art_url
            ));
            #$req->debugDumpParams();
            header('Location: ./succes_article.php');
        }

        public function suppression($art_id,$bdd){
        $supp = $bdd->prepare("DELETE FROM article WHERE art_id=:art_id");
        $supp -> execute(array(
            'art_id'=>$art_id
        ));
        }

        public function modification($art_id,$art_contenu,$cat_id,$bdd){
        $modif = $bdd->prepare("UPDATE article SET art_contenu=:art_contenu, cat_id=:cat_id WHERE art_id=:art_id");
        $modif->execute(array(
            'art_contenu'=>$art_contenu,
            'cat_id'=>$cat_id,
            'art_id'=>$art_id
        ));
        }

        public function url($art_titre){

            $table = array(
                'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
                'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A','@'=>'a', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
                'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
                'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
                'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
                'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
                'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'þ'=>'b',
                'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r',' '=>'_', '¤'=>'o'
            );
            $art_url=strtr($art_titre,$table);
        return $art_url;

        }
}