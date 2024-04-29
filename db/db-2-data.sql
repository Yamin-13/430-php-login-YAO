-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `430-php-login-YAO`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'V', 'Visa')
    ,(20, 'MS', 'MasterCard')
;

INSERT INTO user (id, idRole, password, email) VALUES
     (80, 20, 'IMO 1117777', 'Bonaparte@gmail.com')
    ,(90, 20, 'IMO 2227777', 'MonteCinto@gmail.com')
    ,(100, 20, 'IMO 3333777', 'PagliaOrba@gmail.com')
    ,(110, 10, 'IMO 4447777', 'StenaCarrier@gmail.com')
;