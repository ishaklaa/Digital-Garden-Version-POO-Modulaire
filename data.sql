CREATE DATABASE Dgarden;
USE Dgarden;
 CREATE TABLE role(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom ENUM('admin', 'user') NOT NULL
);
CREATE TABLE utilisateurs(
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id int ,
    username VARCHAR(50) NOT NULL UNIQUE,
    PASSWORD VARCHAR(255) NOT NULL,
    email VARCHAR(30) UNIQUE,
    statut ENUM ("en attente","active","bloquée"),
    dateInscription DATE NOT NULL ,
    FOREIGN KEY(role_id) REFERENCES role(id)
);
 CREATE TABLE themes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    couleur VARCHAR(12) NOT NULL,
    FOREIGN KEY(user_id) REFERENCES utilisateurs(id)
);
 CREATE TABLE notes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    theme_id INT NOT NULL,
    titre VARCHAR(20) NOT NULL,
    importance VARCHAR(20) NOT NULL,
    contenu TEXT NOT NULL,
    date_creation DATE NOT NULL,
    FOREIGN KEY(theme_id) REFERENCES themes(id)
); 

CREATE TABLE administrateur(
    id INT AUTO_INCREMENT PRIMARY KEY
);
CREATE TABLE gardners(
    id int  AUTO_INCREMENT PRIMARY KEY
);
ALTER TABLE utilisateurs
ADD COLUMN statut ENUM('en attente','active','bloquée');

insert into role (nom) VALUES ("user");
insert into role (nom) VALUES ("admin");
