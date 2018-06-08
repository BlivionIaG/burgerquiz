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
        mdp            Varchar (128) NOT NULL
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
# THEMES
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(1, 'Cuisine', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(2, 'Informatique', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(3, 'Politique', true);
INSERT INTO Theme(id_theme, nom_theme, active) VALUES(4, 'Humour', true);
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
# REPONSE
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(1, 0, 'A mettre sur la viande', 1);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(2, 1, 'Se prononce correctement', 2);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(3, 0, 'Manière de cuisiner les pates', 3);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(4, 2, 'Fait le café', 4);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(5, 0, "Rends l'argent !", 5);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(6, 2, 'Les meilleurs', 6);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(7, 2, 'A le plus gros bouton', 7);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(8, 1, "N'a jamais fait partie de l'UE", 8);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(9, 1, 'Les Meilleures Blagues', 9);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(10, 2, 'Libre ?', 10);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(11, 1, 'Le plus utilisé', 11);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(12, 0, "C'est drôle", 12);
INSERT INTO Reponse(id_reponse, valeur_reponse, proposition, id_question) VALUES(13, 1, 'Le quiz', 13);
# PARTIE
INSERT INTO Partie(id_partie, nom_partie) VALUES(1, 'Partie Miam');
INSERT INTO Partie(id_partie, nom_partie) VALUES(2, 'Partie Geek');
INSERT INTO Partie(id_partie, nom_partie) VALUES(3, 'Partie Vieux');
INSERT INTO Partie(id_partie, nom_partie) VALUES(4, 'Partie pas drole');
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
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 1, 540, 76);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 1, 30, 93); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 1, 666, 62); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 1, 420, 82);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 2, 503, 80);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 2, 190, 89); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 2, 890, 39); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(2, 3, 50, 102);  
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 3, 1, 1029838);
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(1, 4, 1023, 21); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(3, 4, 89, 98); 
INSERT INTO Possede(id_partie, id_utilisateur, score, temps) VALUES(4, 4, 340, 75);  