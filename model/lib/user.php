<?php

/**
 * user.
 * 
 * @param string E-mail e-mail.
 * @param string password, corse de préférence.
 * @param PDO db Connexion à la BDD.
 * @return boolean Succès ou échec. 
 * 
 */
function getUser(string $email, string $password, PDO $db): array
{
    // - Prépare la requête
    $query = 'SELECT user.id, user.email, user.password, user.idRole';
    $query .= ' FROM user';
    $query .= ' WHERE ';
    $query .= ' user.email = :email';
    $query .= ' ,user.password = :password';
    $statement = $db->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
  
    // - Exécute la requête
    $successOrFailure = $statement->execute();
    $user = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $user;
}
