<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Reponse
 *
 * @author kev29lt
 */
class Reponse {

    private $id_reponse;
    private $valeur_reponse;
    private $proposition;
    private $id_question;

    public function create($_id_reponse, $_valeur_reponse, $_proposition, $_id_question) {
        $this->setId_reponse($_id_reponse);
        $this->setValeur_reponse($_valeur_reponse);
        $this->setProposition($_proposition);
        $this->setId_question($_id_question);
    }

    public function getId_reponse() {
        return $this->id_reponse;
    }

    public function getValeur_reponse() {
        return $this->valeur_reponse;
    }

    public function getProposition() {
        return $this->proposition;
    }

    public function getId_question() {
        return $this->id_question;
    }

    public function setId_reponse($_id_reponse) {
        $this->id_reponse = $_id_reponse;
    }

    public function setValeur_reponse($_valeur_reponse) {
        $this->valeur_reponse = $_valeur_reponse;
    }

    public function setProposition($_proposition) {
        $this->proposition = $_proposition;
    }

    public function setId_question($_id_question) {
        $this->id_question = $_id_question;
    }

}
