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
            values(:mail, :prenom, :nom, :mdp)';
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
    
     public function deleteUser($id) {
         try {
            $request = 'delete from Utilisateur where id_utilisateur=:id';
            $statement = $this->getBdd()->prepare($request);
            $statement->bindParam(':id', $_id, PDO::PARAM_INT);
            $result = $statement->execute();
        } catch (PDOException $exception) {
            error_log('Request error: ' . $exception->getMessage());
            return false;
        }
        return $result;
    }
}
