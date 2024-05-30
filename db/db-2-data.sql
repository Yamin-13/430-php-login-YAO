-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `430-php-login-YAO`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'ADM', 'Admin')
    ,(20, 'SUSR', 'SampleUser')
;

INSERT INTO user (id, idRole, password, email) VALUES
   
    (110, 10, 'bob', 'bob')   ---> mot de passe de bob l'admin hashé : $2y$10$eO1EhZvLXRmyfB4f0tl1pe/oxTmMQJeJGblfWYSHAi.KJtNfAOm9W
;

SELECT user.email, role.code
FROM user
JOIN role ON user.idRole = role.id
;