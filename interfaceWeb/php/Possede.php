<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Possede
 *
 * @author kev29lt
 */
class Possede {

    private $id_partie;
    private $id_utilisateur;
    private $score;
    private $temps;

    public function create($_id_partie, $_id_utilisateur, $_score, $_temps) {
        $this->setId_partie($_id_partie);
        $this->setId_utilisateur($_id_utilisateur);
        $this->setScore($_score);
        $this->setTemps($_temps);
    }

    public function getId_partie() {
        return $this->id_partie;
    }

    public function getId_utilisateur() {
        return $this->id_utilisateur;
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

    public function setScore($_score) {
        $this->score = $_score;
    }

    public function setTemps($_temps) {
        $this->temps = $_temps;
    }

}
