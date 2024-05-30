<?php
// Ouvre une connexion à la Base de données
require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';

session_start();

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

// Lis les informations saisies dans le formulaire
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileTmpName  = $_FILES['file']['tmp_name'];
$fileType = $_FILES['file']['type'];

// Redimensionne l'image
// WARN! sudo apt install php-gd
const MY_IMG_PNG = 'image/png';
const MY_IMG_JPG = 'image/jpeg';
$imgOriginal;
if ($fileType == MY_IMG_PNG) {
    $imgOriginal = imagecreatefrompng($fileTmpName);
}
if ($fileType == MY_IMG_JPG) {
    $imgOriginal = imagecreatefromjpeg($fileTmpName);
}
$img = imagescale($imgOriginal, 200);
imagepng($img, $fileTmpName);


// Insère les données en base
$db = getConnection($dbConfig);
$query = '';
$query .= ' UPDATE user';
$query .= ' SET';
$query .= ' ,user.avatar_filename = :avatar_filename';
$query .= ' WHERE user.id = :idUser';
$statement = $db->prepare($query);
$statement->bindParam(':avatar_filename', basename($fileName));
$statement->bindParam(':idUser', $_SESSION['user']['id']);
$successOrFailure = $statement->execute();
$id = $db->lastInsertId();

// Copie aussi le fichier d'avatar dans un répertoire
$uploadPath = $uploadDirectory . basename($fileName);
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

// Met à jour le contexte de session
$dbConnection = getConnection($dbConfig);
$user = getUser($_SESSION['user']['email'], $_SESSION['user']['id'],  $dbConnection);
$_SESSION['user'] = $user;

header('Location: ' . '/ctrl/profile/profile-add.php');
