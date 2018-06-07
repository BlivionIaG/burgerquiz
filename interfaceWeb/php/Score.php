<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Score
 *
 * @author kev29lt
 */
class Score {

    private $id_partie;
    private $id_utilisateur;
    private $prenom;
    private $nom;
    private $nom_partie;
    private $score;
    private $temps;

    public function create($_id_partie, $_id_utilisateur, $_prenom, $_nom, $_nom_partie, $_score, $_temps){
        $this->setId_partie($_id_partie);
        $this->setId_utilisateur($_id_utilisateur);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setNom_partie($_nom_partie);
        $this->setScore($_score);
        $this->setTemps($_temps);
    }
    
    public function getId_partie() {
        return $this->id_partie;
    }

    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNom_partie() {
        return $this->nom_partie;
    }

    public function getScore() {
        return $this->score;
    }

    public function getTemps() {
        return $this->temps;
    }

    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }

    public function setPrenom($_prenom) {
        $this->prenom = $_prenom;
    }

    public function setNom($_nom) {
        $this->nom = $_nom;
    }

    public function setNom_partie($_nom_partie) {
        $this->nom_partie = $_nom_partie;
    }

    public function setScore($_score) {
        $this->score = $_score;
    }

    public function setTemps($_temps) {
        $this->temps = $_temps;
    }

}
