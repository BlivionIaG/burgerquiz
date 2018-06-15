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
 * \file comprend.php
 * \brief Classe conteneur du lien Question/Partie
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */

/**
 * \class comprend
 * 
 * \brief Classe conteneur du lien Question/Partie
 */
class comprend {

    private $id_question; /**< \brief identifiant de la question */
    private $id_partie; /**< \brief Identifiant de la partie */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_question identifiant de la question
     * \param int $_id_partie identifiant de la partie
     */
    public function create($_id_question, $_id_partie) {
        $this->setId_question($_id_question);
        $this->setId_partie($_id_partie);
    }

    /**
     * \brief Renvoie l'objet sous forme de tableau clé => valeur
     * 
     * \return array tableau associatif à l'image de l'objet
     */
    public function toArray() {
        return array(
            'id_question' => $this->getId_question(),
            'id_partie' => $this->getId_partie()
        );
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
     * \brief Getter de l'identifiant de la partie
     * 
     * \return int identifiant de la partie
     */
    public function getId_partie() {
        return $this->id_partie;
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
     * \brief Setter de l'identifiant de la partie
     * 
     * \param int $_id_partie identifiant de la partie
     */
    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

}
