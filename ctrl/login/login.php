<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

// // 


// Ouvre une connexion à la Base de données
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

// ca récupére les informations d'identification du formulaire
$login = [];
$login['mail'] = $_POST['mail'];
$login['password'] = $_POST['password'];

// appelle la fonction getUser() pour vérifier les informations d'identification
if (getUser($login['mail'], $login['password'])) {
    // Si l'utilisateur existe et que le mot de passe est correct
    // Crée une session pour l'utilisateur et redirige-le vers la page welcome
    session_start();
    $_SESSION['login'] = $login;
    header('Location: ./index.php');
    exit();
} else {
    // Si l'utilisateur n'existe pas ou que le mot de passe est incorrect
    // Redirige l'utilisateur vers la page de login
    header('Location: /ctrl/login/login-display.php');
    exit();
}
?>



