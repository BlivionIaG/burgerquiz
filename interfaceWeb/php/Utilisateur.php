<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Utilisateur
 *
 * @author kev29lt
 */
class Utilisateur {

    private $id_utilisateur;
    private $mail;
    private $prenom;
    private $nom;
    private $mdp;
    private $token;

    public function create($_id_utilisateur, $_mail, $_prenom, $_nom, $_mdp, $_token = null) {
        $this->setId_utilisateur($_id_utilisateur);
        $this->setMail($_mail);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setMdp($_mdp);
        $this->setToken($_token);
    }

    public function fromArray($array) {
        if (isset($array['id_utilisateur'])) {
            $this->setId_utilisateur($array['id_utilisateur']);
        }
        if (isset($array['mail'])) {
            $this->setMail($array['mail']);
        }
        if (isset($array['prenom'])) {
            $this->setPrenom($array['prenom']);
        }
        if (isset($array['nom'])) {
            $this->setNom($array['nom']);
        }
        if (isset($array['mdp'])) {
            $this->setMdp($array['mdp']);
        }
        if (isset($array['token'])) {
            $this->setToken($array['token']);
        }
    }

    public function toArray() {
        return array(
            'id_utilisateur' => $this->getId_utilisateur(),
            'mail' => $this->getMail(),
            'prenom' => $this->getPrenom(),
            'nom' => $this->getNom(),
            'mdp' => $this->getMdp(),
            'token' => $this->getToken()
        );
    }

    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getToken() {
        return $this->token;
    }

    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }

    public function setMail($_mail) {
        $this->mail = $_mail;
    }

    public function setPrenom($_prenom) {
        $this->prenom = $_prenom;
    }

    public function setNom($_nom) {
        $this->nom = $_nom;
    }

    public function setMdp($_mdp) {
        $this->mdp = $_mdp;
    }

    public function setToken($_token) {
        $this->token = $_token;
    }

}
