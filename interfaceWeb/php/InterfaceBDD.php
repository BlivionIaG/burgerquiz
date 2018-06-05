<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of InterfaceBDD
 *
 * @author kev29lt
 */
require_once('consts.php');
require_once('Utilisateur.php');
require_once('Theme.php');
require_once('Partie.php');
require_once('Possede.php');
require_once('Question.php');
require_once('Reponse.php');
require_once('comprend.php');

class InterfaceBDD {

    private $bdd;

    public function InterfaceBDD() {
        $this->Connect();
    }

    public function getBdd() {
        return $this->bdd;
    }

    public function setBdd($_bdd) {
        $this->bdd = $_bdd;
    }

    public function Connect() {
        try {
            $this->setBdd(new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD));
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $this->getBdd();
    }

    public function AddUser($user) {
        try {
            $request = 'insert into Utilisateur(mail, prenom, nom, mdp)
            values(:mail, :prenom, :nom, sha(:mdp))';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':mail', $user->getMail(), PDO::PARAM_STR, 256);
            $statement->bindParam(':prenom', $user->getPrenom(), PDO::PARAM_STR, 128);
            $statement->bindParam(':nom', $user->getNom(), PDO::PARAM_STR, 128);
            $statement->bindParam(':mdp', $user->getMdp(), PDO::PARAM_STR, 128);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

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

    public function UpdateUser($user) {
        try {
            $request = 'update Utilisateur mail=:mail, prenom=:prenom, nom=:nom, mdp=sha2(:mdp) where set id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $user->getId_utilisateur(), PDO::PARAM_INT);
            $statement->bindParam(':mail', $user->getMail(), PDO::PARAM_STR, 256);
            $statement->bindParam(':prenom', $user->getPrenom(), PDO::PARAM_STR, 128);
            $statement->bindParam(':nom', $user->getNom(), PDO::PARAM_STR, 128);
            $statement->bindParam(':mdp', $user->getMdp(), PDO::PARAM_STR, 128);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

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

    function CheckUser($mail, $mdp) {
        try {
            $request = 'select * from Utilisateur where mail=:mail and mdp=sha(:mdp)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR, 256);
            $statement->bindParam(':mdp', $mdp, PDO::PARAM_STR, 128);
            $statement->execute();
            $result = $statement->fetch();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        if (!$result) {
            return false;
        }
        
        return true;
    }

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

    public function AddPartie($partie) {
        try {
            $request = 'insert into Partie(nom_partie) values(:nom_partie)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':nom_partie', $partie->getNom_partie(), PDO::PARAM_STR, 256);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

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

    public function AddPossede($possede) {
        try {
            $request = 'insert into Possede(id_partie, id_utilisateur, score, temps)
            values(:id_partie, :id_utilisateur, :score, :temps)';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_partie', $possede->getId_partie(), PDO::PARAM_INT);
            $statement->bindParam(':id_utilisateur', $possede->getId_utilisateur, PDO::PARAM_INT);
            $statement->bindParam(':score', $possede->getScore(), PDO::PARAM_INT);
            $statement->bindParam(':temps', $possede->getTemps(), PDO::PARAM_INT);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Connection error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

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

    public function RequestUserPartieScores($id_utilisateur, $id_partie) {
        try {
            $request = 'select * from Possede where id_utilisateur=:id_utilisateur and id_partie=:id_partie';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $statement->bindParam(':id_partie', $id_partie, PDO::PARAM_INT);
            $statement->execute();
            $result = $statement->fetchAll(PDO::FETCH_CLASS, 'Possede');
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }

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

    public function RequestReponse($id) {
        try {
            $request = 'select * from Reponse where id_reponse:id';
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

    public function RequestReponseOfQuestion($id) {
        try {
            $request = 'select * from Reponse where id_question:id';
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

    public function RequestQuestionsOfPartie($id_partie) {
        try {
            $request = 'select * from comprend where id_partie:id';
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

}
