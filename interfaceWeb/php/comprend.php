<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of comprend
 *
 * @author kev29lt
 */
class comprend {

    private $id_question;
    private $id_partie;

    public function create($_id_question, $_id_partie) {
        $this->setId_question($_id_question);
        $this->setId_partie($_id_partie);
    }

    public function toArray() {
        return array(
            'id_question' => $this->getId_question(),
            'id_partie' => $this->getId_partie()
        );
    }

    public function getId_question() {
        return $this->id_question;
    }

    public function getId_partie() {
        return $this->id_partie;
    }

    public function setId_question($_id_question) {
        $this->id_question = $_id_question;
    }

    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

}
