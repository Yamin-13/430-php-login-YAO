<?php
// Ouvre une connexion à la Base de données
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
session_start();
// ca récupére les informations d'identification du formulaire envoyé par POST
$user = [];
$user['mail'] = $_POST['mail'];
$user['password'] = $_POST['password'];

// ca se connecte à la base de données avec ces parametres
$dbConnection = getConnection($dbConfig);

// la fonction getUser retourne un tableau ou false et le résultat est stocké dans UserDAta avec
// les informations d'identification et la connexion à la base de données
$userData = getUser($user['mail'], $user['password'], $dbConnection);

// test la variable si elle est NULL
// var_dump($userData); 
// exit();

// Pour vérifier les informations d'identification
if ($userData !== null) {  // !== c'est l'opérateur strict pour vérifié si userdata retourne null via varDump
    // Si l'utilisateur existe et que le mot de passe est correct
    // Alors ca crée une session pour l'utilisateur et le redirige vers la page welcome
   
    $_SESSION['user'] = $userData;  // <=======CEST ICI QUE LE STOCKAGE DE LUTILISATEUR SE FAIT DANS SESSION 
    header('Location: /view/login/welcome.php');
    exit();
} else {
    //message d'erreur qui s'affiche
    $_SESSION['error'] = 'Identifiants incorrects. Veuillez réessayer.';

    // Sinon ca redirige vers la page de login
    header('Location: /ctrl/login/display.php');
    exit();
}


