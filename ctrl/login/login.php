<?php
// Ouvre une connexion à la Base de données
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';

// ca récupére les informations d'identification du formulaire
$user = [];
$user['mail'] = $_POST['mail'];
$user['password'] = $_POST['password'];

$dbConnection = getConnection($dbConfig);
$user = getUser($user['mail'], $user['password'], $dbConnection);

// appelle la fonction getUser() pour vérifier les informations d'identification
if (getUser($user['mail'], $user['password'], $dbConnection)) {
    // si l'utilisateur existe et que le mot de passe est correct
    // ca crée une session pour l'utilisateur et le redirige vers la page welcome
    session_start();
    $_SESSION['user'] = $user;
    header('Location: ./ctrl/login/welcome.php');
    exit();
} else {
    // sinon l'utilisateur n'existe pas ou que le mot de passe est incorrect
    // ca le redirige  vers la page de login
    header('Location: /ctrl/login/login-display.php');
    exit();
}

?>



