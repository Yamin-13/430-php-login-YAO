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
function getUser(string $email, string $password, PDO $db)
{
    // - Prépare la requête
    $query = 'SELECT user.id, user.email, user.password, user.idRole';
    $query .= ' FROM user';
    // $query .= ' WHERE ';
    // $query .= ' user.email = :email';
    $query .= ' WHERE user.email = :email AND user.password = :password ';
    // $query .= ' ,user.password = :password';
    $statement = $db->prepare($query);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
  
    // - Exécute la requête
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
   
    // Ca retourne null si aucun utilisatet est trouvé
    return $user ? $user : null;
}
