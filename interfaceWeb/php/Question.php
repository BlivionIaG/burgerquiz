<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Question
 *
 * @author kev29lt
 */
class Question {

    private $id_question;
    private $choix_un;
    private $choix_deux;
    private $id_theme;

    public function create($_id_question, $_choix_un, $_choix_deux, $_id_theme) {
        $this->setId_question($_id_question);
        $this->setChoix_un($_choix_un);
        $this->setChoix_deux($_choix_deux);
        $this->setId_theme($_id_theme);
    }

    public function getId_question() {
        return $this->id_question;
    }

    public function getChoix_un() {
        return $this->choix_un;
    }

    public function getChoix_deux() {
        return $this->choix_deux;
    }

    public function getId_theme() {
        return $this->id_theme;
    }

    public function setId_question($_id_question) {
        $this->id_question = $_id_question;
    }

    public function setChoix_un($_choix_un) {
        $this->choix_un = $_choix_un;
    }

    public function setChoix_deux($_choix_deux) {
        $this->choix_deux = $_choix_deux;
    }

    public function setId_theme($_id_theme) {
        $this->id_theme = $_id_theme;
    }

}
