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

    public function toArray() {
        $out = [];

        $out['id_reponse'] = $this->getId_reponse();
        $out['valeur_reponse'] = $this->getValeur_reponse();
        $out['proposition'] = $this->getProposition();
        $out['id_question'] = $this->getId_question();

        return $out;
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
