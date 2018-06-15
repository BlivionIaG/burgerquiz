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
 * \file Possede.php
 * \brief Classe conteneur de Lien question/partie
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */

/**
 * \class Partie
 * 
 * \brief Classe conteneur de Lien question/partie
 */
class Possede {

    private $id_partie; /**< \brief Identifiant de la partie */
    private $id_utilisateur; /**< \brief Identifiant de l'utilisateur */
    private $score; /**< \brief score de la partie jouée */
    private $temps; /**< \brief temps de la partie jouée */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_partie identifiant de la partie
     * \param int $_id_utilisateur identifiant de l'utilisateur
     * \param int $_score score
     * \param int $_temps temps
     */
    public function create($_id_partie, $_id_utilisateur, $_score, $_temps) {
        $this->setId_partie($_id_partie);
        $this->setId_utilisateur($_id_utilisateur);
        $this->setScore($_score);
        $this->setTemps($_temps);
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
     * \brief Getter de l'identifiant utilisateur
     * 
     * \return int identifiant utilisateur
     */
    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * \brief Getter du score
     * 
     * \return int score
     */
    public function getScore() {
        return $this->score;
    }

    /**
     * \brief Getter Temps
     * 
     * \return int temps
     */
    public function getTemps() {
        return $this->temps;
    }

    /**
     * \brief Setter identifiant de partie
     * 
     * \param int $_id_partie identifiant de la partie
     */
    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    /**
     * \brief Setter de l'identifiant utilisateur
     * 
     * \param int $_id_utilisateur identifiant de l'utilisateur
     */
    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }

    /**
     * \brief Setter du score
     * 
     * \param int $_score score
     */
    public function setScore($_score) {
        $this->score = $_score;
    }

    /**
     * \brief Setter du temps
     * 
     * \param int $_temps temps
     */
    public function setTemps($_temps) {
        $this->temps = $_temps;
    }

}
