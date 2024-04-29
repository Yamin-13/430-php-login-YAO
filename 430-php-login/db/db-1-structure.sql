-- - Supprime la base de données si elle existe déjà
-- - Crée la base de données
-- - Mentionne le nom de la base de données à utiliser pour exécuter les commandes SQL qui suivent
DROP DATABASE IF EXISTS `430-login`;
CREATE DATABASE IF NOT EXISTS `430-login`;
USE `430-login`;

-- -------------
-- TABLES
-- -------------

CREATE TABLE typeNavire (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
)
;

CREATE TABLE navire (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,numeroIMO varchar(50) NOT NULL
  ,nom varchar(50) NOT NULL
  ,idTypeNavire bigint(20) NOT NULL
)
;

CREATE TABLE service (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
)
;

CREATE TABLE serviceAutorise (
   idTypeNavire bigint(20) NOT NULL
  ,idService bigint(20) NOT NULL
)
;

CREATE TABLE activite (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
  ,idService bigint(20) NOT NULL
)
;

CREATE TABLE marin (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,matricule varchar(50) NOT NULL
  ,nom varchar(50) NOT NULL
  ,prenom varchar(50) NOT NULL
)
;

CREATE TABLE port (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,nom varchar(50) NOT NULL
)
;

CREATE TABLE traversee (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,reference varchar(50) NOT NULL
  ,idNavire bigint(20) NOT NULL
  ,idPortDepart bigint(20) NOT NULL
  ,idPortArrivee bigint(20) NOT NULL
  ,dateDepart timestamp NOT NULL
)
;

CREATE TABLE planning (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,idTraversee bigint(20) NOT NULL
)
;

CREATE TABLE affectation (
   id bigint(20) NOT NULL AUTO_INCREMENT PRIMARY KEY
  ,idPlanning bigint(20) NOT NULL
  ,idMarin bigint(20) NOT NULL
  ,idActivite bigint(20) NOT NULL
  ,heureDebut time NOT NULL
  ,heureFin time NOT NULL
)
;

-- -------------
-- CONTRAINTES
-- -------------

ALTER TABLE typeNavire
   ADD CONSTRAINT `u_typeNavire_nom` UNIQUE(nom)
;

ALTER TABLE navire
   ADD CONSTRAINT `u_navire_numeroIMO` UNIQUE(numeroIMO)
  ,ADD CONSTRAINT `fk_navire_typeNavire` FOREIGN KEY(idTypeNavire) REFERENCES typeNavire(id)
;

ALTER TABLE service
   ADD CONSTRAINT `u_service_nom` UNIQUE(nom)
;

ALTER TABLE serviceAutorise
   ADD CONSTRAINT `u_serviceAutorise_idTypeNavire_idService` UNIQUE(idTypeNavire, idService)
  ,ADD CONSTRAINT `fk_serviceAutorise_typeNavire` FOREIGN KEY(idTypeNavire) REFERENCES typeNavire(id)
  ,ADD CONSTRAINT `fk_serviceAutorise_service` FOREIGN KEY(idService) REFERENCES service(id)
;

ALTER TABLE activite
   ADD CONSTRAINT `u_service_nom` UNIQUE(nom)
  ,ADD CONSTRAINT `fk_activite_service` FOREIGN KEY(idService) REFERENCES service(id)
;

ALTER TABLE affectation
   ADD CONSTRAINT `fk_affectation_planning` FOREIGN KEY(idPlanning) REFERENCES planning(id)
  ,ADD CONSTRAINT `fk_affectation_marin` FOREIGN KEY(idMarin) REFERENCES marin(id)
  ,ADD CONSTRAINT `fk_affectation_activite` FOREIGN KEY(idActivite) REFERENCES activite(id)
;

ALTER TABLE planning
   ADD CONSTRAINT `fk_planning_traversee` FOREIGN KEY(idTraversee) REFERENCES traversee(id)
;

ALTER TABLE traversee
   ADD CONSTRAINT `u_traversee_reference` UNIQUE(reference)
  ,ADD CONSTRAINT `fk_traversee_navire` FOREIGN KEY(idNavire) REFERENCES navire(id)
  ,ADD CONSTRAINT `fk_traversee_port_depart` FOREIGN KEY(idPortDepart) REFERENCES port(id)
  ,ADD CONSTRAINT `fk_traversee_port_arrivee` FOREIGN KEY(idPortArrivee) REFERENCES port(id)
;

ALTER TABLE marin
   ADD CONSTRAINT `u_marin_matricule` UNIQUE(matricule)
;

ALTER TABLE port
   ADD CONSTRAINT `u_port_nom` UNIQUE(nom)
;