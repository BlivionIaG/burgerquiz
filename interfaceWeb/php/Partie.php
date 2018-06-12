<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Partie
 *
 * @author kev29lt
 */
class Partie {

    private $id_partie;
    private $nom_partie;

    public function create($_id_partie, $_nom_partie) {
        $this->setId_partie($_id_partie);
        $this->setNom_partie($_nom_partie);
    }

    public function toArray() {
        return array(
            'id_partie' => $this->getId_partie(),
            'nom_partie' => $this->getNom_partie()
        );
    }

    public function getId_partie() {
        return $this->id_partie;
    }

    public function getNom_partie() {
        return $this->nom_partie;
    }

    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    public function setNom_partie($_nom_partie) {
        $this->nom_partie = $_nom_partie;
    }

}
