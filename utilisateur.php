<?php



class utilisateur{


    public function inscription($user_login,$user_password,$bdd){

        $test_exist = $bdd-> prepare("SELECT * FROM utilisateur WHERE user_login=:user_login ");
        $test_exist->execute(array('user_login'=>$user_login));
        $test_exist = $test_exist->rowCount();

        if ($test_exist!=0) {
            header('Location: ./erreur_inscription_login.php');
        }
        else{
                $req = $bdd->prepare("INSERT INTO utilisateur(user_login , user_password) VALUES (:user_login , MD5(:user_password))");
                $req->execute(array(
                    'user_login'=>$user_login,
                    'user_password'=>$user_password
                ));
            header('Location: ./succes.php');
        }
    }
     public function connexion($user_login,$user_password,$bdd){

         $id_login = $bdd->prepare("SELECT * FROM utilisateur WHERE user_login = :user_login AND user_password = MD5(:user_password)");
         $id_login->execute(array('user_login'=>$user_login,'user_password'=>$user_password));
         $test_login = $id_login->fetch();

         if (!$test_login){

             header('Location: ./erreur_connexion.php');
         }
        else{
            session_start();
            $_SESSION['user_id']=$test_login['user_id'];
            $_SESSION['user_login']=$user_login;
            $_SESSION['user_password']=$user_password;

            header('Location: ./succes_connexion.php');
        }
     }
}