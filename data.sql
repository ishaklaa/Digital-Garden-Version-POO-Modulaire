CREATE DATABASE Dgarden;
USE Dgarden;

CREATE TABLE role (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom ENUM('admin', 'user', 'modirateur') NOT NULL
);

CREATE TABLE utilisateurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    role_id INT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) UNIQUE,
    statut ENUM('en attente', 'active', 'bloquée') DEFAULT 'en attente',
    dateInscription TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES role(id)
);

CREATE TABLE themes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    nom VARCHAR(50) NOT NULL,
    couleur VARCHAR(12) NOT NULL,
    statut ENUM('prive', 'public') NOT NULL,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id)
);

CREATE TABLE notes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    theme_id INT NOT NULL,
    titre VARCHAR(50) NOT NULL,
    importance VARCHAR(20) NOT NULL,
    contenu TEXT NOT NULL,
    statut ENUM('prive', 'public') NOT NULL,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (theme_id) REFERENCES themes(id)
);

CREATE TABLE administrateur (
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE gardners (
    id INT AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE modirateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id)
);

CREATE TABLE signalement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    elementType VARCHAR(34) NOT NULL,
    raison TEXT NOT NULL,
    datesignal TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    user_id int,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id),
);
CREATE table favnote(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    note_id int,
    FOREIGN KEY (user_id) REFERENCES utilisateurs(id),
    FOREIGN KEY (note_id) REFERENCES notes(id)
);

CREATE table favtheme(
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_id int,
   theme_id int,
   FOREIGN KEY (user_id) REFERENCES utilisateurs(id),
   FOREIGN KEY (theme_id) REFERENCES themes(id)
);

CREATE TABLE partage(
   id INT AUTO_INCREMENT PRIMARY KEY,
   user_id int,
   note_id int,
   FOREIGN KEY (sender_id) REFERENCES utilisateurs(id),
   FOREIGN KEY (user_id) REFERENCES utilisateurs(id),
   FOREIGN KEY (note_id) REFERENCES notess(id)

);
INSERT INTO role (nom) VALUES ('user'), ('admin'), ('modirateur');
