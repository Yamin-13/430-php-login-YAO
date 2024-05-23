<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/asset/style.css">
    <title><?= $titrePage ?></title>
</head>

<body>
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/view/partial/header.php'; ?>
    <main>
        <div class="formulaire">
            <div class="wrapper">
                <img src="/asset/img/dahlia.png" alt="">
                <h2 class="text-right">Bienvenue</h2>
                <div class="form-wrapper login">

                    <form action="/ctrl/login/login.php" method="post">
                        <h2>S'Identifier</h2>
                        <!-- E-mail -->
                        <div class="input-box">
                            <label for="code"></label>
                            <input type="text" name="mail" id="code" placeholder="Email" required>
                        </div>
                        <!-- PASSWORD -->
                        <div class="input-box">
                            <label for="label"></label>
                            <input type="password" name="password" id="label" placeholder="Mot De Passe" required>
                        </div>
                        <!-- <div class="forgot-pass">
                    <a href="#">Mot de passe oublié?</a>
                </div> -->
                        <button type="submit">S'Identifier</button>
                        <div class="sign-link">
                            <p>Pas encore inscrits? <a href="#" onclick="registerActive()">Inscription</a></p>
                        </div>

                        <div class="error-message">
                    <?php
                    session_start(); // ca initialise une session et la stock ou la reprend si elle existe déja dans les cookies. c'est grace à cette fonction qu'on peut utiliser la variable session
                    if (isset($_SESSION['error'])) { // isset verifie si ($_SESSION['error']) est pas null
                        echo '<p class= "error-message">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']); // unset ca retire ($_SESSION['error']) de la session pour supprimer le message d'érreur
                    }
                    ?>
                </div>

                    </form>
                </div>

                <div class="form-wrapper register">
                    <form action="" method="post">
                        <h2>Inscription</h2>
                        <div class="input-box">

                            <input type="text" placeholder="Nom prénom" required>
                        </div>
                        <div class="input-box">

                            <input type="text" placeholder="Email" required>
                        </div>
                        <div class="input-box">

                            <input type="password" placeholder="Mot de Passe" required>
                        </div>
                        <button type="submit">Inscription</button>
                        <div class="sign-link">
                            <p>Déjà Inscrits? <a href="#" onclick="loginActive()">S'Identifier</a></p>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
    <script src="/asset/scipt.js"></script>
</body>

</html>