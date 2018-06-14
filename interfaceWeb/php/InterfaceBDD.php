<?php

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

require_once('consts.php');
require_once('Utilisateur.php');
require_once('Theme.php');
require_once('Partie.php');
require_once('Possede.php');
require_once('Question.php');
require_once('Reponse.php');
require_once('comprend.php');
require_once('Score.php');

/**
 * \file InterfaceBDD.php
 * \brief Classe de gestion de la base de données
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 13 juin 2018
 *
 * Gère toutes les fonctionnalités en lien avec la Base de donnée (BDD)
 */

/**
 * \class InterfaceBDD
 * 
 * \brief Classe de gestion de la base de données
 * 
 * Gère toutes les fonctionnalités en lien avec la Base de donnée (BDD)
 */
class InterfaceBDD {

    private $bdd; /**< \brief PDO utilisé pour l'intégralité des actions effectuées sur la BDD */

    /**
     * \brief Constructeur de la classe InterfaceBDD
     * 
     * Se connecte à la base de donnée MySQL, précisée dans php/consts.php
     */
    public function InterfaceBDD() {
        $this->Connect();
    }

    /**
     * \brief Getter du PHP Data Object contenu dans InterfaceBDD
     * 
     * \return PDO Interface accès base de donnée
     */
    public function getBdd() {
        return $this->bdd;
    }

    /**
     * \brief Setter du PHP Data Object contenu dans InterfaceBDD
     * 
     * \param PDO $_bdd Interface accès base de donnée
     */
    public function setBdd($_bdd) {
        $this->bdd = $_bdd;
    }

    /**
     * \brief Connecte l'objet à la base de donnée
     * 
     * Se connecter selon les constantes définies dans php/consts.php
     * 
     * \return boolean erreur | PDO réussi
     */
    public function Connect() {
        try {
            $this->setBdd(new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD));
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $this->getBdd();
    }

    /**
     * \brief Ajout d'un utilisateur à la BDD
     * 
     * \param Utilisateur $user User à ajouter
     * 
     * \return boolean Ajout réussi ou non
     */
    public function AddUser($user) {
        try {
            $mail = $user->getMail();
            $prenom = $user->getPrenom();
            $nom = $user->getNom();
            $mdp = $user->getMdp();

            $verif = $this->FindUser($mail);
            if ($verif) {
                error_log('User already exist !');
                return false;
            }

            $request = 'insert into Utilisateur(mail, prenom, nom, mdp)
            values(:mail, :prenom, :nom, sha(:mdp))';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR, 256);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR, 128);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR, 128);
            $statement->bindParam(':mdp', $mdp, PDO::PARAM_STR, 128);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie l'identifiant du premier utilisateur comportant le même mail
     * 
     * \param string $mail Email/login de l'utilisateur
     * 
     * \return int identifiant de l'utilisateur
     */
    public function FindUser($mail) {
        try {
            $request = 'select * from Utilisateur where mail=:mail';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR, 256);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return 0;
        }
        if (!sizeof($result)) {
            return 0;
        }

        return $result[0]->getId_utilisateur();
    }

    /**
     * \brief Renvoie l'utilisateur possèdant l'identifiant donné
     * 
     * \param int $id Identifiant de l'utilisateur
     * 
     * \return boolean Erreur | Utilisateur[] utilisateur trouvé
     */
    public function RequestUser($id) {
        try {
            $request = 'select * from Utilisateur where id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie tous les utilisateurs enregistré dans la BDD
     * 
     * \return boolean Erreur | Utilisateur[] utilisateurs
     */
    public function RequestAllUser() {
        try {
            $request = 'select * from Utilisateur';
            $statement = $this->getBdd()->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Met à jour l'utilisateur
     * 
     * \param Utilisateur $user utilisateur à mettre à jour
     * 
     * \return boolean statut réussite de la maj
     */
    public function UpdateUser($user) {
        try {
            $id = $user->getId_utilisateur();
            $mail = $user->getMail();
            $prenom = $user->getPrenom();
            $nom = $user->getNom();
            $mdp = $user->getMdp();

            $request = 'update Utilisateur set mail=:mail, prenom=:prenom, nom=:nom, mdp=sha(:mdp) where id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR, 256);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR, 128);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR, 128);
            $statement->bindParam(':mdp', $mdp, PDO::PARAM_STR, 128);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Suppression de l'utilisateur possèdant l'identifiant donné
     * 
     * \param int $id identifiant de l'utilisateur à supprimer
     *
     * \return boolean statut réussite de la requète
     */
    public function RemoveUser($id) {
        try {
            $request = 'delete from Utilisateur where id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Vérifie les identifiants de login sont valides
     * 
     * \param string $mail Login de l'utilisateur à vérifier
     * \param string $mdp Mot de passe de l'utilisateur à vérifier
     * 
     * \return int identifiant de l'utilisateur valide sinon 0
     */
    function CheckUser($mail, $mdp) {
        try {
            $request = 'select * from Utilisateur where mail=:mail and mdp=sha(:mdp)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR, 256);
            $statement->bindParam(':mdp', $mdp, PDO::PARAM_STR, 128);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Utilisateur');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return 0;
        }
        if (!sizeof($result)) {
            return 0;
        }

        return $result[0]->getId_utilisateur();
    }

    /**
     * \brief Récupère le thème avec l'identifiant correspondant
     * 
     * \param Theme $id identifiant du thème
     * 
     * \return boolean Erreur | Theme[] thèmes correpondants
     */
    public function RequestTheme($id) {
        try {
            $request = 'select * from Theme where id_theme=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Theme');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Récupère tous les thèmes contenus dans la BDD
     * 
     * \return boolean Erreur | Theme[] Thèmes contenus dans la BDD
     */
    public function RequestAllThemes() {
        try {
            $request = 'select * from Theme';
            $statement = $this->getBdd()->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Theme');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Ajoute la partie à la BDD
     * 
     * On vérifie d'abords qu'il n'existe pas une partie du même nom
     * 
     * \param Partie $partie Partie à ajouter
     * 
     * \return boolean Statut réussite de la requète
     */
    public function AddPartie($partie) {
        if ($this->CheckPartie($partie)) {
            error_log('Partie name already taken !');
            return false;
        }

        $nom_partie = $partie->getNom_partie();

        try {
            $request = 'insert into Partie(nom_partie) values(:nom_partie)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':nom_partie', $nom_partie, PDO::PARAM_STR, 256);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Vérifie si une partie du même nom n'existe pas déjà dans la BDD
     * 
     * \param Partie $partie partie à vérifier
     * 
     * \return boolean Existe ou non ( tout entier != 0 => true )
     */
    public function CheckPartie($partie) {
        try {
            $nom = $partie->getNom_partie();

            $request = 'select * from Partie where nom_partie=:nom';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Partie');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }

        return sizeof($result);
    }

    /**
     * \brief Trouve l'identifiant de la partie avec son nom
     * 
     * \param Partie $partie partie dont on cherche l'identifiant
     * 
     * \return boolean Erreur | int identifiant trouvé
     */
    public function FindPartieId($partie) {
        try {
            $nom_partie = $partie->getNom_partie();

            $request = 'select * from Partie where nom_partie=:nom';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':nom', $nom_partie, PDO::PARAM_STR);
            $statement->execute();
            $result = $statement->fetchAll();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }

        return $result[0]['id_partie'];
    }

    /**
     * \brief Renvoie la partie avec l'identifiant correspondant
     * 
     * \param int $id identifiant de la partie recherchée
     * 
     * \return boolean Error | Partie[] partie recherchée
     */
    public function RequestPartie($id) {
        try {
            $request = 'select * from Partie where id_partie=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Partie');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Récupère toutes les parties stockées dans la BDD
     * 
     * \return boolean Erreur | Partie[] parties contenues dans la BDD
     */
    public function RequestAllParties() {
        try {
            $request = 'select * from Partie';
            $statement = $this->getBdd()->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Partie');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Supprime la partie correspondante à l'identifiant donné
     * 
     * \param int $id identifiant de la partie à supprimer
     * 
     * \return boolean Status réussite de la requete
     */
    public function RemovePartie($id) {
        try {
            $request = 'delete from Partie where id_partie=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Ajoute le score reliant un Utilisateur à une Partie dans la BDD
     * 
     * Si un score existe déjà et que celui ci est plus faible, il est mis à jour
     * Sinon la requete est abandonnée
     * 
     * \param Possede $possede score à ajouter
     * 
     * \return boolean Statut réussite de la requète
     */
    public function AddPossede($possede) {
        $id_partie = $possede->getId_partie();
        $id_utilisateur = $possede->getId_utilisateur();
        $score = $possede->getScore();
        $temps = $possede->getTemps();

        $match = $this->CheckPossede($id_partie, $id_utilisateur);
        if (!$match) {
            try {
                $request = 'insert into Possede(id_partie, id_utilisateur, score, temps)
            values(:id_partie, :id_utilisateur, :score, :temps)';
                $statement = $this->getBdd()->prepare($request);
                $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
                $statement->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
                $statement->bindParam(':score', strval($score), PDO::PARAM_STR);
                $statement->bindParam(':temps', strval($temps), PDO::PARAM_STR);
                $result = $statement->execute();
            } catch (PDOException $exception) {
                error_log('Connection error: ' . $exception->getMessage());
                return false;
            }

            return $result;
        } else if ($match[0]->getScore() >= $score) {
            return false;
        } else {
            return $this->UpdatePossede($possede);
        }
    }

    /**
     * \brief Mis à jour du score d'une partie d'un utilisateur
     * 
     * \param Possede $possede score à modifier
     * 
     * \return boolean Statut réussite de la requete
     */
    public function UpdatePossede($possede) {
        try {
            $id_partie = $possede->getId_partie();
            $id_utilisateur = $possede->getId_utilisateur();
            $score = $possede->getScore();
            $temps = $possede->getTemps();

            $request = 'update Possede set id_partie=:id_partie, id_utilisateur=:id_utilisateur, score=:score, temps=:temps where id_utilisateur=:id_utilisateur && id_partie=:id_partie';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $statement->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $statement->bindParam(':score', strval($score), PDO::PARAM_STR);
            $statement->bindParam(':temps', strval($temps), PDO::PARAM_STR);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Vérifie si un score reliant un utilisateur et une partie donnée existent
     * 
     * \param int $id_partie identifiant de la partie
     * \param int $id_utilisateur identifiant de l'utilisateur
     * 
     * \return boolean Erreur | Possede[] score correspondant
     */
    public function CheckPossede($id_partie, $id_utilisateur) {
        try {
            $request = 'select * from Possede where id_utilisateur=:id_utilisateur && id_partie=:id_partie';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Renvoie le meilleur score de l'utilisateur donné
     * 
     * \param int $id identifiant de l'utilisateur
     * 
     * \return boolean Erreur | Possede meilleur score
     */
    public function RequestBestScore($id) {
        try {
            $request = 'select * from Possede where id_utilisateur=:id order by score desc limit 1';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result[0];
    }

    /**
     * \brief Renvoie tous les scores stockés dans la BDD
     * 
     * \return boolean Erreur | Possede[] Tous les scores
     */
    public function RequestAllScores() {
        try {
            $request = 'select * from Possede';
            $statement = $this->getBdd()->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie tous les scores d'une partie donnée
     * 
     * \param int $id identifiant de la partie
     * 
     * \return boolean Erreur | Possede[] scores des utilisateurs
     */
    public function RequestPartieScores($id) {
        try {
            $request = 'select * from Possede where id_partie=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie tous les scores d'un utilisateur donné
     * 
     * \param int $id identifiant de l'utilisateur
     * 
     * \return boolean Erreur | Possede[] scores de l'utilisateur
     */
    public function RequestUserScores($id) {
        try {
            $request = 'select * from Possede where id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Vérifie si un score reliant un utilisateur et une partie donnée existent
     * 
     * alias de CheckPossede($id_partie, $id_utilisateur)
     * 
     * \param int $id_partie identifiant de la partie
     * \param int $id_utilisateur identifiant de l'utilisateur
     * 
     * \return boolean Erreur | Possede[] score correspondant
     */
    public function RequestUserPartieScores($id_utilisateur, $id_partie) {
        return $this->CheckPossede($id_partie, $id_utilisateur);
    }

    /**
     * \brief Lie une question à une partie
     * 
     * \param comprend $comprend Lien question/partie
     * 
     * \return boolean Statut réussite de la requete
     */
    public function LinkQuestionToPartie($comprend) {
        try {
            $id_question = $comprend->getId_question();
            $id_partie = $comprend->getId_partie();

            $request = 'insert into comprend(id_question, id_partie) values(:id_question, :id_partie)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_question', $id_question, PDO::PARAM_INT);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Renvoie la question associé à l'identifiant donné
     * 
     * \param int $id identifiant de la question
     * 
     * \return boolean Erreur | Question[] question correspondante
     */
    public function RequestQuestion($id) {
        try {
            $request = 'select * from Question where id_question=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Question');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie N question aléatoirement du même thème
     * 
     * \param int $id_theme identifiant du thème
     * \param int $n_questions nombre de questions
     * 
     * \return boolean Erreur | Question[] questions choisies aléatoirement
     */
    public function RequestNRandomQuestionsByTheme($id_theme, $n_questions) {
        try {
            $request = 'SELECT * FROM Question WHERE id_question IN (' .
                    'SELECT id_question FROM (' .
                    'SELECT id_question FROM Question where id_theme=:id_theme ' .
                    'ORDER BY -LOG(1-RAND()) LIMIT :n_questions)' .
                    ' t)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_theme', $id_theme, PDO::PARAM_INT);
            $statement->bindParam(':n_questions', $n_questions, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Question');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie la réponse correspondant à l'identifiant donné
     * 
     * \param int $id identifiant de la reponse
     * 
     * \return boolean Erreur | Reponse[] Réponse recherchée
     */
    public function RequestReponse($id) {
        try {
            $request = 'select * from Reponse where id_reponse=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Reponse');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie les réponses de la question
     * 
     * \param int $id identifiant de la question
     * 
     * \return boolean Erreur | Reponse[] Réponses à la question
     */
    public function RequestReponseOfQuestion($id) {
        try {
            $request = 'select * from Reponse where id_question=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Reponse');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie les liens question/partie de la partie correspondante
     * 
     * \param int $id_partie identifiant de la partie
     * 
     * \return boolean Erreur | comprend[] Liens question/partie
     */
    public function RequestQuestionsOfPartie($id_partie) {
        try {
            $request = 'select * from comprend where id_partie=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id_partie, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'comprend');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie les N meilleurs scores toutes parties confondues
     * 
     * \param int $nb Nombre de scores choisi
     * 
     * \return boolean Erreur | Score[] score
     */
    public function GetTopScores($nb) {
        try {
            $request = 'select Utilisateur.prenom, Utilisateur.nom, Partie.nom_partie, Possede.score, Possede.temps'
                    . ' from Possede,Utilisateur,Partie'
                    . ' where Possede.id_utilisateur=Utilisateur.id_utilisateur && Possede.id_partie=Partie.id_partie'
                    . ' order by Possede.score desc, Utilisateur.prenom, Utilisateur.nom'
                    . ' limit :nb';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':nb', $nb, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Score');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Récupère les scores d'un utilisateur donné sous forme d'un tableau
     * 
     * \param int $id_utilisateur identifiant de l'utilisateur
     * 
     * \return boolean Erreur | array les scores
     */
    public function GetScores($id_utilisateur) {
        try {
            $request = 'select Possede.id_partie, Partie.nom_partie, Possede.score, Possede.temps from Possede, Partie where Possede.id_utilisateur=:id_utilisateur && Possede.id_partie=Partie.id_partie';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }

        return $result;
    }

    /**
     * \brief Renvoie le thème d'une partie donnée
     * 
     * \param int $id_partie identifiant de la partie
     * 
     * \return boolean Erreur | array informations thème de la partie
     */
    public function GetTheme($id_partie) {
        try {
            $request = 'select Theme.id_theme, Theme.nom_theme, Theme.active from comprend,Question,Theme' .
                    ' where comprend.id_partie=:id_partie' .
                    ' && comprend.id_question=Question.id_question' .
                    ' && Question.id_theme=Theme.id_theme' .
                    ' group by nom_theme';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }

        return $result[0];
    }

    /**
     * \brief Renvoie toutes les parties avec leur thème correspondants dans un tableau
     * 
     * \return boolean Erreur | array tableau des parties avec leur thème  
     */
    public function RequestAllPartiesWithTheme() {
        try {
            $request = 'select T.id_partie, T.nom_partie, Theme.nom_theme from (' .
                    'select Partie.id_partie, Partie.nom_partie, Question.id_theme from' .
                    ' comprend, Partie, Question ' .
                    'where comprend.id_partie=Partie.id_partie &&' .
                    ' comprend.id_question=Question.id_question group by Partie.id_partie) ' .
                    'as T,Theme where T.id_theme=Theme.id_theme';
            $statement = $this->getBdd()->prepare($request);
            $statement->execute();
            $result = $statement->fetchAll();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie toutes les questions de la partie sous forme de tableau
     * 
     * Le tableau associatif est fait pour l'execution du jeu dans php/request.php
     * 
     * \param int $id_partie identifiant de la partie
     * 
     * \return array tableau des questions
     */
    public function RequestGameReadyQuestions($id_partie) {
        $result = [];
        $questions = $this->RequestQuestionFromPartie($id_partie);
        foreach ($questions as $question) {
            $reponse = $this->RandomSelectReponseFromQuestion($question->getId_question())[0];

            array_push($result, array(
                'id_question' => $question->getId_question(),
                'choix_un' => $question->getChoix_un(),
                'choix_deux' => $question->getChoix_deux(),
                'id_reponse' => $reponse->getId_reponse(),
                'valeur_reponse' => $reponse->getValeur_reponse(),
                'proposition' => $reponse->getProposition()
            ));
        }

        return $result;
    }

    /**
     * \brief Renvoie les questions d'une partie
     * 
     * \param int $id_partie identifiant de la partie
     * 
     * \return boolean Erreur | Question[] question de la partie
     */
    public function RequestQuestionFromPartie($id_partie) {
        try {
            $request = 'select Question.* from comprend, Question where comprend.id_partie=:id_partie && comprend.id_question=Question.id_question';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Question');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

    /**
     * \brief Renvoie une réponse/proposition aléatoire de la question donnée
     * 
     * \param int $id_question identifiant de la question
     * 
     * \return boolean Erreur | Reponse[] réponse à la question selectionnée
     */
    public function RandomSelectReponseFromQuestion($id_question) {
        try {
            $request = 'select * from Reponse where id_question=:id order by -LOG(1-RAND()) limit 1';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $id_question, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Reponse');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

}
