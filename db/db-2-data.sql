-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `430-php-login`;

INSERT INTO role (id, code, label ) VALUES
     (10, 'V', 'Visa')
    ,(20, 'MS', 'MasterCard')
;

INSERT INTO user (id, idRole, password, email) VALUES
     (80, 20, '1234', 'Bonaparte@gmail.com')
    ,(90, 20, 'azer', 'MonteCinto@gmail.com')
    ,(100, 20, 'qsdf', 'PagliaOrba@gmail.com')
    ,(110, 10, 'wxcv', 'StenaCarrier@gmail.com')
;