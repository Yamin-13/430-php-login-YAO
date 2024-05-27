-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `430-php-login`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'ADM', 'Admin')
    ,(20, 'SUSR', 'SampleUser')
;

INSERT INTO user (id, idRole, password, email) VALUES
     (80, 20, 'toto', 'toto@a.fr')
    ,(90, 20, 'tata', 'tata@a.fr')
    ,(100, 20, 'titi', 'titi@a.fr')
    ,(110, 10, 'bob', 'bob')
;

SELECT user.email, role.code
FROM user
JOIN role ON user.idRole = role.id
;