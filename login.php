<?php include __DIR__ . '/header.php' ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div>
            <div>
                <h1 class="border-bottom w-100">Formulaire d'inscription</h1>
                <form action="traitement_connexion.php" method="post" enctype="multipart/form-data" class="col-md-4">
                    <div class="form-group">
                        <label for="monPseudo">Pseudo</label>
                        <input class="form-control" id="monPseudo" name="monPseudo">
                    </div>
                    <div class="form-group">
                        <label for="monMotDePasse">Mot de passe</label><br>
                        <input type="password" class="form-control" id="monMotDePasse" name="monMotDePasse">
                    </div>
                    <input type="submit" value="Se connecter !">
                </form>
            </div>
        </div>
    </main>

<?php include __DIR__ . '/footer.php' ?>