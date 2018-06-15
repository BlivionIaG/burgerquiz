/*
 * Copyright (C) 2018 Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database: Burgerquiz
#------------------------------------------------------------

DROP DATABASE if exists Burgerquiz;
CREATE DATABASE Burgerquiz;
USE Burgerquiz;

#------------------------------------------------------------
# Tables cleanup
#------------------------------------------------------------

DROP TABLE if exists Themes;
DROP TABLE if exists Question;
DROP TABLE if exists Reponse;
DROP TABLE if exists Partie;
DROP TABLE if exists Utilisateur;
DROP TABLE if exists comprend;
DROP TABLE if exists Possede;

#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id_utilisateur Int  Auto_increment  NOT NULL ,
        mail           Varchar (256) NOT NULL ,
        nom            Varchar (128) NOT NULL ,
        prenom         Varchar (128) NOT NULL ,
        mdp            Varchar (128) NOT NULL ,
        token          Varchar (256)
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Partie
#------------------------------------------------------------

CREATE TABLE Partie(
        id_partie  Int  Auto_increment  NOT NULL ,
        nom_partie Varchar (256) NOT NULL
	,CONSTRAINT Partie_PK PRIMARY KEY (id_partie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Theme
#------------------------------------------------------------

CREATE TABLE Theme(
        id_theme  Int  Auto_increment  NOT NULL ,
        nom_theme Varchar (256) NOT NULL,
        active Boolean NOT NULL
	,CONSTRAINT Theme_PK PRIMARY KEY (id_theme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Question
#------------------------------------------------------------

CREATE TABLE Question(
        id_question Int  Auto_increment  NOT NULL ,
        choix_un    Varchar (256) NOT NULL ,
        choix_deux  Varchar (256) NOT NULL ,
        id_theme    Int NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (id_question)

	,CONSTRAINT Question_Theme_FK FOREIGN KEY (id_theme) REFERENCES Theme(id_theme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reponse
#------------------------------------------------------------

CREATE TABLE Reponse(
        id_reponse     Int  Auto_increment  NOT NULL ,
        valeur_reponse Int NOT NULL ,
        proposition    Varchar (512) NOT NULL ,
        id_question    Int NOT NULL
	,CONSTRAINT Reponse_PK PRIMARY KEY (id_reponse)

	,CONSTRAINT Reponse_Question_FK FOREIGN KEY (id_question) REFERENCES Question(id_question)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Possede
#------------------------------------------------------------

CREATE TABLE Possede(
        id_partie      Int NOT NULL ,
        id_utilisateur Int NOT NULL ,
        score          BigInt NOT NULL ,
        temps          BigInt NOT NULL
	,CONSTRAINT Possede_PK PRIMARY KEY (id_partie,id_utilisateur)

	,CONSTRAINT Possede_Partie_FK FOREIGN KEY (id_partie) REFERENCES Partie(id_partie)
	,CONSTRAINT Possede_Utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comprend
#------------------------------------------------------------

CREATE TABLE comprend(
        id_question Int NOT NULL ,
        id_partie   Int NOT NULL
	,CONSTRAINT comprend_PK PRIMARY KEY (id_question,id_partie)

	,CONSTRAINT comprend_Question_FK FOREIGN KEY (id_question) REFERENCES Question(id_question)
	,CONSTRAINT comprend_Partie0_FK FOREIGN KEY (id_partie) REFERENCES Partie(id_partie)
)ENGINE=InnoDB;

#------------------------------------------------------------
# Insertion données:
#------------------------------------------------------------
# USERS
INSERT INTO Utilisateur(id_utilisateur, mail, prenom, nom, mdp) VALUES(1, 'kevin@burger.quiz', 'Bevin', 'Chen', SHA('bev'));
INSERT INTO Utilisateur(id_utilisateur, mail, prenom, nom, mdp) VALUES(2, 'antoine@burger.quiz', 'Antoine', 'Argent', SHA('mdp'));
INSERT INTO Utilisateur(id_utilisateur, mail, prenom, nom, mdp) VALUES(3, 'zuckerberg@burger.quiz', 'I am watching', 'You', SHA('123456'));
INSERT INTO Utilisateur(id_utilisateur, mail, prenom, nom, mdp) VALUES(4, 'bill.gates@microsoft.com', 'Bill', 'Gates', SHA('microsoft'));
INSERT INTO Utilisateur(id_utilisateur, mail, prenom, nom, mdp) VALUES(5, 'a@a.a', 'a', 'a', SHA('a'));
# THEMES
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(1, 'Cuisine', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(2, 'Informatique', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(3, 'Politique', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(4, 'Humour', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(5, 'ISEN', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(6, 'Inutile', false);
# QUESTIONS
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(1, 'Sel', 'Poivre', 1);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(2, 'Pain au Chocolat', 'Chocolatine', 1);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(3, 'A la casserole', 'Au micro ondes', 1);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(4, 'C++', 'Java', 2);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(5, 'François Fillion', 'La Caissière', 3);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(6, 'Bretons', 'Parigots', 4);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(7, 'Kim Jong Un', 'Donald Trump', 3);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(8, 'Royaume Uni', 'France', 3);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(9, 'Carambar', 'Au JT de 20h sur TF1', 4);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(10, 'GitHub', 'GitLab', 2);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(11, 'Andoid', 'IOS', 2);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(12, 'ahahahahahah !', 'jajajajajaja !', 4);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(13, 'Burger', 'Sandwich', 1);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(14, 'Club Foyer', 'Bureau des Sports', 5);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(15, 'Le Foyer', 'Super U', 5);
INSERT INTO Question(id_question, choix_un, choix_deux, id_theme) VALUES(16, 'Les deux', 'Les deux', 5);
# REPONSE
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(1, 0, 'A mettre sur la viande', 1);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(2, 1, 'Se prononce correctement', 2);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(3, 0, 'Manière de cuisiner les pates', 3);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(4, 2, 'Fait le café', 4);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(5, 0, "Rends l'argent !", 5);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(6, 1, 'Les meilleurs', 6);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(7, 2, 'A le plus gros bouton', 7);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(8, 1, "N'a jamais fait partie de l'UE", 8);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(9, 1, 'Les Meilleures Blagues', 9);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(10, 2, 'Libre ?', 10);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(11, 1, 'Le plus utilisé', 11);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(12, 0, "C'est drôle", 12);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(13, 1, 'Le quiz', 13);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(14, 0, 'Est compilé', 4);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(15, 2, 'Est interprété', 4);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(16, 1, 'Le meilleur Club', 14);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(17, 0, 'On peut réchauffer nos plats', 15);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(18, 0, 'Les deux', 16);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(19, 1, 'Les deux', 16);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(20, 2, 'Les deux', 16);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(21, 1, 'Les meilleurs repas', 15);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(22, 0, 'Ils ont une carte de fidèlité', 15);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(23, 2, 'Le pire club', 14);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(24, 1, "A gagné un ISEN d'or", 14);
# PARTIE
INSERT INTO Partie(id_partie, nom_partie) VALUES(1, 'Partie Miam');
INSERT INTO Partie(id_partie, nom_partie) VALUES(2, 'Partie Geek');
INSERT INTO Partie(id_partie, nom_partie) VALUES(3, 'Partie Vieux');
INSERT INTO Partie(id_partie, nom_partie) VALUES(4, 'Partie pas drole');
INSERT INTO Partie(id_partie, nom_partie) VALUES(5, 'ISEN Stuff');
# LIEN QUESTION PARTIE
INSERT INTO comprend(id_question, id_partie) VALUES(1, 1);
INSERT INTO comprend(id_question, id_partie) VALUES(2, 1);
INSERT INTO comprend(id_question, id_partie) VALUES(3, 1);
INSERT INTO comprend(id_question, id_partie) VALUES(13, 1);
INSERT INTO comprend(id_question, id_partie) VALUES(4, 2);
INSERT INTO comprend(id_question, id_partie) VALUES(10, 2);
INSERT INTO comprend(id_question, id_partie) VALUES(11, 2);
INSERT INTO comprend(id_question, id_partie) VALUES(5, 3);
INSERT INTO comprend(id_question, id_partie) VALUES(7, 3);
INSERT INTO comprend(id_question, id_partie) VALUES(8, 3);
INSERT INTO comprend(id_question, id_partie) VALUES(6, 4);
INSERT INTO comprend(id_question, id_partie) VALUES(9, 4);
INSERT INTO comprend(id_question, id_partie) VALUES(12, 4);
# LIEN UTILISATEUR PARTIE
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 1, 3500, 5);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 1, 1200, 37); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 1, 2300, 17); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 1, 2500, 5);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 2, 900, 5);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 2, 3600, 3); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 2, 2700, 3); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 3, 0, 128);  
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 3, 2300, 8);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 4, 1700, 7); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 4, 1700, 5); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 4, 1800, 2);  