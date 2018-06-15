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
 * \file Reponse.php
 * \brief Classe conteneur de Réponses/Propositions
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */

/**
 * \class Reponse
 * 
 * \brief Classe conteneur de Reponses/Questions
 */
class Reponse {

    private $id_reponse; /**< \brief Identifiant de la réponse */
    private $valeur_reponse; /**< \brief Valeur de la réponse (0: Les Deux, 1: Choix un, 2: Choix deux */
    private $proposition; /**< \brief Proposition */
    private $id_question; /**< \brief Identifiant de la question */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_reponse identifiant de la reponse
     * \param int $_valeur_reponse Valeur de la réponse
     * \param string $_proposition Proposition pour la réponse
     * \param int $_id_question identifiant de la question
     */
    public function create($_id_reponse, $_valeur_reponse, $_proposition, $_id_question) {
        $this->setId_reponse($_id_reponse);
        $this->setValeur_reponse($_valeur_reponse);
        $this->setProposition($_proposition);
        $this->setId_question($_id_question);
    }

    /**
     * \brief Renvoie l'objet sous forme de tableau clé => valeur
     * 
     * \return array tableau associatif à l'image de l'objet
     */
    public function toArray() {
        $out = [];

        $out['id_reponse'] = $this->getId_reponse();
        $out['valeur_reponse'] = $this->getValeur_reponse();
        $out['proposition'] = $this->getProposition();
        $out['id_question'] = $this->getId_question();

        return $out;
    }

    /**
     * \brief Getter de l'identifiant de la réponse
     * 
     * \return int identifiant réponse
     */
    public function getId_reponse() {
        return $this->id_reponse;
    }

    /**
     * \brief Getter valeur de la réponse
     * 
     * \return int valeur de la réponse
     */
    public function getValeur_reponse() {
        return $this->valeur_reponse;
    }

    /**
     * \brief Getter valeur Proposition
     * 
     * \return string proposition
     */
    public function getProposition() {
        return $this->proposition;
    }

    /**
     * \brief Getter de l'identifiant de la question
     * 
     * \return int identifiant de la question
     */
    public function getId_question() {
        return $this->id_question;
    }

    /**
     * \brief Setter identifiant de la réponse
     * 
     * \param int $_id_reponse identifiant de la réponse
     */
    public function setId_reponse($_id_reponse) {
        $this->id_reponse = $_id_reponse;
    }

    /**
     * \brief Setter valeur réponse
     * 
     * \param int $_valeur_reponse valeur réponse
     */
    public function setValeur_reponse($_valeur_reponse) {
        $this->valeur_reponse = $_valeur_reponse;
    }

    /**
     * \brief Setter proposition de la réponse
     * 
     * \param string $_proposition proposition de la réponse
     */
    public function setProposition($_proposition) {
        $this->proposition = $_proposition;
    }

    /**
     * \brief Setter identifiant de la question
     * 
     * \param int $_id_question identifiant de la question
     */
    public function setId_question($_id_question) {
        $this->id_question = $_id_question;
    }

}
