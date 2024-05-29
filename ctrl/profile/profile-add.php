<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';

session_start();

$_SESSION['msg']['info'] = [];
$_SESSION['msg']['error'] = [];

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/upload/';

const MY_IMG_PNG = 'image/png';
const MY_IMG_JPG = 'image/jpeg';
const LIST_ACCEPTED_FILE_TYPE = [MY_IMG_PNG, MY_IMG_JPG];
const FILE_MAX_SIZE = 10;

// Lis les informations saisies dans le formulaire
$fileName = $_FILES['file']['name'];
$fileSize = $_FILES['file']['size'];
$fileTmpName  = $_FILES['file']['tmp_name'];
$fileType = $_FILES['file']['type'];

// Effectue différents tests sur les données saisies
$isSupportedFileType = in_array($fileType, LIST_ACCEPTED_FILE_TYPE);
if (!$isSupportedFileType) {

    // Ajoute un flash-message
    $_SESSION['msg']['error'][] = 'Les seuls formats de fichier acceptés sont : ' . implode(',', LIST_ACCEPTED_FILE_TYPE);
}
if (true) {
    //...filesize
}

$hasErrors = !empty($_SESSION['msg']['error']);
if ($hasErrors) {

    // Redirige vers le formulaire pour corrections
    header('Location: ' . '/ctrl/profile/profile-add-display.php');
    exit();
}

// Redimensionne l'image
// WARN! sudo apt install php-gd
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
$query = 'INSERT INTO user (avatar_filename) VALUES (:avatar_filename)';
$statement = $db->prepare($query);
// $statement->bindParam(':avatar', fopen($fileTmpName, 'rb'), PDO::PARAM_LOB);
$statement->bindParam(':avatar_filename', basename($fileName), PDO::PARAM_STR);
$successOrFailure = $statement->execute();
$id = $db->lastInsertId();

// Copie aussi le fichier d'avatar dans un répertoire
$uploadPath = $uploadDirectory . basename($fileName);
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

// Ajoute un flash-message
$_SESSION['msg']['info'][] = 'Le Profil a été créé.';

// Redirige vers le détail du Profil créé
header('Location: ' . '/ctrl/profile/profile.php?id=' . $id);
