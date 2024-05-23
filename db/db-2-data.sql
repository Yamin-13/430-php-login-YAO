-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `430-php-login`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'A', 'Admin')
    ,(20, 'NLU', 'noLogUser')
;

INSERT INTO user (id, idRole, password, email) VALUES
     (80, 20, 'toto', 'toto@gmail.com')
    ,(90, 20, 'tata', 'tata@gmail.com')
    ,(100, 20, 'titi', 'titi@gmail.com')
    ,(110, 10, 'bob', 'bob@gmail.com')
;