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
 * \file Question.php
 * \brief Classe conteneur de Questions
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */

/**
 * \class Question
 * 
 * \brief Classe conteneur de Questions
 */
class Question {

    private $id_question; /**< \brief identifiant de la question */
    private $choix_un; /**< \brief Choix un de la question */
    private $choix_deux; /**< \brief Choix deux de la question */
    private $id_theme; /**< \brief Identifiant du thème */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_question identifiant de la question
     * \param string $_choix_un choix un de la question
     * \param string $_choix_deux choix deux de la question
     * \param int $_id_theme identifiant du thème
     */
    public function create($_id_question, $_choix_un, $_choix_deux, $_id_theme) {
        $this->setId_question($_id_question);
        $this->setChoix_un($_choix_un);
        $this->setChoix_deux($_choix_deux);
        $this->setId_theme($_id_theme);
    }

    /**
     * \brief Renvoie l'objet sous forme de tableau clé => valeur
     * 
     * \return array tableau associatif à l'image de l'objet
     */
    public function toArray() {
        $out = [];

        $out['id_question'] = $this->getId_question();
        $out['choix_un'] = $this->getChoix_un();
        $out['choix_deux'] = $this->getChoix_deux();
        $out['id_theme'] = $this->getId_theme();
        
        return $out;
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
     * \brief Getter du choix un
     * 
     * \return string choix un
     */
    public function getChoix_un() {
        return $this->choix_un;
    }

    /**
     * \brief Getter du choix deux
     * 
     * \return string choix deux
     */
    public function getChoix_deux() {
        return $this->choix_deux;
    }

    /**
     * \brief Getter de l'identifiant du thème
     * 
     * \return int identifiant du thème
     */
    public function getId_theme() {
        return $this->id_theme;
    }

    /**
     * \brief Setter identifiant de la question
     * 
     * \param int $_id_question identifiant de la question
     */
    public function setId_question($_id_question) {
        $this->id_question = $_id_question;
    }

    /**
     * \brief Setter choix un question
     * 
     * \param string $_choix_un choix un de la question
     */
    public function setChoix_un($_choix_un) {
        $this->choix_un = $_choix_un;
    }

    /**
     * \brief Setter choix deux
     * 
     * \param string $_choix_deux choix deux de la question
     */
    public function setChoix_deux($_choix_deux) {
        $this->choix_deux = $_choix_deux;
    }

    /**
     * \brief Setter de l'identifiant du thème
     * 
     * \param int $_id_theme identifiant du thème
     */
    public function setId_theme($_id_theme) {
        $this->id_theme = $_id_theme;
    }

}
