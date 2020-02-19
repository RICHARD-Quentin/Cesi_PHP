<?php include __DIR__ . '/header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div>
            <div>
                <h1 class="border-bottom w-100">Page d'acceuil</h1>
                <?php
                if(isset($_SESSION['user_login']) && isset($_SESSION['user_password'])){
                    echo 'Bonjour ' . $_SESSION['user_login'];
                }
                else{
                    echo 'Bonjour, il semble que vous ne soyez pas connecté ! C\'est par <a href="login.php">ici</a> !<br> 
                          Si vous n\'êtes pas inscrit c\'est par <a href="inscription.php">la</a>.';
                }
                ?>


            </div>
        </div>
    </main>

<?php include __DIR__ . '/footer.php' ?>
