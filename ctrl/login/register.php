<?php
include $_SERVER['DOCUMENT_ROOT'] . '/cfg/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/db.php';
include $_SERVER['DOCUMENT_ROOT'] . '/model/lib/user.php';
session_start();

// récupére les informations du formulaire...
// $name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

// ...et hache le mot de passe
$hashedPassword = password_hash($password, PASSWORD_BCRYPT ); // PASSWORD_BCRYPT ca utilise l'algorithme Blowfish qui est plus sécurisé (survole de la documentation...)

// var_dump($password); // Mp en clair
// var_dump($hashedPassword); // Mp haché

$idRole = 20; // ca donne un role pour les nouveaux utilisateurs (sampleUser)

// se connecte à la base de données
$dbConnection = getConnection($dbConfig);

// Fonction pour ajouter un utilisateur à la bases de données
function addUser($email, $password, $idRole, $db)
{
    $query = 'INSERT INTO user ( email, password, idRole) VALUES ( :email, :password, :idRole)'; // requete SQL avec les parametres pour insérer un nouvel utilisateur dans la table...
    $statement = $db->prepare($query);   // prepare la requete SQL ele retourne un objet PDOstatement                               // ...user avec les 3 collones 
    
    $statement->bindParam(':idRole', $idRole);       //  <----------------------------- // ca lie la valeeur de $idRole au parametre ":idRole" dans la requête SQL ($idRole = :idRole ) 
    $statement->bindParam(':email', $email);        // methode PDOStatement::bindParam // (sécurisé)
    $statement->bindParam(':password', $password); //                                 //
    
    return $statement->execute();  // PDOStatement::execute (ca execute les requetes et retourne true ou false pour l'insert to) 

}
// condition pour affiché les messages de succès ou d'échec
if (addUser($email, $hashedPassword, $idRole, $dbConnection)) {  // Apel de la fonction addUser avec les 4 arguments  
    $_SESSION['success'] = 'Inscription réussie.<br>Vous pouvez maintenant vous connecter.'; // le message sera stocké dans la variable de session "succes" 
    header('Location: /ctrl/login/display.php');
    exit(); // ca arrete l'execution du script ici
} else {
    $_SESSION['error'] = 'Erreur lors de l\'inscription.<br> Veuillez réessayer.';
    header('Location: /ctrl/login/display.php');
    exit();
}
