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

    public function toArray() {
        $out = [];

        $out['id_question'] = $this->getId_question();
        $out['choix_un'] = $this->getChoix_un();
        $out['choix_deux'] = $this->getChoix_deux();
        $out['id_theme'] = $this->getId_theme();
        
        return $out;
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
