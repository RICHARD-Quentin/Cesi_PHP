<?php include __DIR__ . '/header.php'; ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div>
            <h1 class="border-bottom w-100">Formulaire</h1>
            <div class="alert alert-success" role="alert">
                <?php echo 'Bonjour ' .  $_SESSION['user_login'] .  '. Vous êtes connecté !' ?>
            </div>
        </div>
    </main>

<?php include __DIR__ . '/footer.php' ?>