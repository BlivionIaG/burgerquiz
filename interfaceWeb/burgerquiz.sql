#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Themes
#------------------------------------------------------------

CREATE TABLE Themes(
        id_theme  Varchar NOT NULL ,
        nom_theme Varchar
	,CONSTRAINT Themes_PK PRIMARY KEY (id_theme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Question
#------------------------------------------------------------

CREATE TABLE Question(
        id_question Varchar NOT NULL ,
        choix_un    Varchar ,
        choix_deux  Varchar ,
        id_theme    Varchar NOT NULL
	,CONSTRAINT Question_PK PRIMARY KEY (id_question)

	,CONSTRAINT Question_Themes_FK FOREIGN KEY (id_theme) REFERENCES Themes(id_theme)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Reponse
#------------------------------------------------------------

CREATE TABLE Reponse(
        id_reponse  Varchar NOT NULL ,
        reponse     Varchar ,
        proposition Varchar ,
        id_question Varchar NOT NULL
	,CONSTRAINT Reponse_PK PRIMARY KEY (id_reponse)

	,CONSTRAINT Reponse_Question_FK FOREIGN KEY (id_question) REFERENCES Question(id_question)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Partie
#------------------------------------------------------------

CREATE TABLE Partie(
        id_partie  Varchar NOT NULL ,
        nom_partie Varchar
	,CONSTRAINT Partie_PK PRIMARY KEY (id_partie)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Utilisateur
#------------------------------------------------------------

CREATE TABLE Utilisateur(
        id_utilisateur BigInt NOT NULL ,
        mail           Varchar ,
        prenom         Varchar ,
        nom            Varchar ,
        mdp            Varchar (50)
	,CONSTRAINT Utilisateur_PK PRIMARY KEY (id_utilisateur)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comprend
#------------------------------------------------------------

CREATE TABLE comprend(
        id_partie   Varchar NOT NULL ,
        id_question Varchar NOT NULL
	,CONSTRAINT comprend_PK PRIMARY KEY (id_partie,id_question)

	,CONSTRAINT comprend_Partie_FK FOREIGN KEY (id_partie) REFERENCES Partie(id_partie)
	,CONSTRAINT comprend_Question0_FK FOREIGN KEY (id_question) REFERENCES Question(id_question)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: possede
#------------------------------------------------------------

CREATE TABLE possede(
        id_partie      Varchar NOT NULL ,
        id_utilisateur BigInt NOT NULL ,
        score          BigInt NOT NULL ,
        temps          BigInt NOT NULL
	,CONSTRAINT possede_PK PRIMARY KEY (id_partie,id_utilisateur)

	,CONSTRAINT possede_Partie_FK FOREIGN KEY (id_partie) REFERENCES Partie(id_partie)
	,CONSTRAINT possede_Utilisateur0_FK FOREIGN KEY (id_utilisateur) REFERENCES Utilisateur(id_utilisateur)
)ENGINE=InnoDB;