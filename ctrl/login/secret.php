<?php
session_start();
$titrePage = "Fleur De Dahlia";

// var_dump($_SESSION['user']);

// if($_SESSION['user'][0]['idRole'] == 20){
//     if (isset($_SESSION['user'][0]['idRole']) && $_SESSION['user'][0]['idRole'] == 20) {
    
//     include $_SERVER['DOCUMENT_ROOT'] . '/view/login/secret.php';

// } else {
//     // rend la vue
//     header('Location: /view/login/display.php');
// }
// =========================================================
$idRole = $_SESSION['user']['idRole'];
if ($idRole == 10){
    include $_SERVER['DOCUMENT_ROOT'] . '/view/login/secret.php';

} else {
    // rend la vue
    header('Location: /ctrl/login/display.php');
}



