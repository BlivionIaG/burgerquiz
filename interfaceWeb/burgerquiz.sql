#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------

#------------------------------------------------------------
# Database: Burgerquiz
#------------------------------------------------------------

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
        nom_theme Varchar (256) NOT NULL
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
        valeur_reponse Varchar (128) NOT NULL ,
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

