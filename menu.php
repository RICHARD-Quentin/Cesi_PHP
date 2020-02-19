<nav class="col-md-2 d-none d-md-block bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <?php
            session_start();
            if(isset($_SESSION['user_login']) && isset($_SESSION['user_password'])){?>
                <h1 class="text-center"> <?php echo $_SESSION['user_login'] ?></h1>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Accueil <span class="sr-only">(current)</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        Deconnexion
                    </a>
                </li>
                <h2>Articles</h2>
                <li class="nav-item">
                    <a class="nav-link" href="publi_article.php">
                        Nouvel article <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="articles.php">
                        Article <span class="sr-only">(current)</span>
                    </a>
                </li>

            <?php
            }
            else{
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        Accueil <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">
                        Connexion
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="inscription.php">
                        Inscription <span class="sr-only">(current)</span>
                    </a>
                </li>
                <h2>Articles</h2>
                <li class="nav-item">

                <li class="nav-item">
                    <a class="nav-link" href="articles.php">
                        Article <span class="sr-only">(current)</span>
                    </a>
                </li>
            <?php
            }
            ?>
            <hr>

        </ul>
    </div>
</nav>