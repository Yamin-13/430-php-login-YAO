-- Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent.
USE `410-php-database-YAO`;

INSERT INTO typeNavire(id, nom) VALUES
     (10, 'Cargo')
    ,(20, 'Ferry')
;

INSERT INTO navire(id, idTypeNavire, numeroIMO, nom) VALUES
     (10, 20, 'IMO 1117777', 'Bonaparte')
    ,(20, 20, 'IMO 2227777', 'Monte Cinto')
    ,(30, 20, 'IMO 3333777', 'Paglia Orba')
    ,(40, 10, 'IMO 4447777', 'Stena Carrier')
;
