<?php
session_start();
// var_dump($_SESSION['user']);
$titrePage = "Fleur De Dahlia";

if($_SESSION['user'][0]['idRole'] == 10){
    
    include $_SERVER['DOCUMENT_ROOT'] . '/view/login/secret.php';

} else {
    header('Location: /view/login/welcome.php');
}
// rend la vue