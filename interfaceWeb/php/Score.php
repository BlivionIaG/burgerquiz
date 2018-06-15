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
 * \file Score.php
 * \brief Classe conteneur de Score
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 07 juin 2018
 */

/**
 * \class Score
 * 
 * \brief Classe conteneur de Score
 */
class Score {

    private $id_partie; /**< \brief identifiant de la partie */
    private $id_utilisateur; /**< \brief identifiant de l'utilisateur */
    private $prenom; /**< \brief prenom de l'utilisateur */
    private $nom; /**< \brief nom de l'utilisateur */
    private $nom_partie; /**< \brief nom de la partie */
    private $score; /**< \brief valeur score */
    private $temps; /**< \brief temps de partie */

    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_partie identifiant de la partie
     * \param int $_id_utilisateur identifiant de l'utilisateur
     * \param string $_prenom prenom utilisateur
     * \param string $_nom nom utilisateur
     * \param string $_nom_partie nom de la partie
     * \param int $_score valeur score de la partie
     * \param int $_temps valeur temps de la parties
     */
    public function create($_id_partie, $_id_utilisateur, $_prenom, $_nom, $_nom_partie, $_score, $_temps){
        $this->setId_partie($_id_partie);
        $this->setId_utilisateur($_id_utilisateur);
        $this->setPrenom($_prenom);
        $this->setNom($_nom);
        $this->setNom_partie($_nom_partie);
        $this->setScore($_score);
        $this->setTemps($_temps);
    }
    
    /**
     * \brief Getter identifiant de la partie
     * 
     * \return int identifiant de la partie
     */
    public function getId_partie() {
        return $this->id_partie;
    }

    /**
     * \brief Getter identifiant utilisateur
     * 
     * \return int identifiant utilisateur
     */
    public function getId_utilisateur() {
        return $this->id_utilisateur;
    }

    /**
     * \brief Getter prenom utilisateur
     * 
     * \return string prenom
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * \brief Getter nom utilisateur
     * 
     * \return string nom
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * \brief Getter nom partie
     * 
     * \return string nom partie
     */
    public function getNom_partie() {
        return $this->nom_partie;
    }

    /**
     * \brief Getter score
     * 
     * \return int score de la partie
     */
    public function getScore() {
        return $this->score;
    }

    /**
     * \brief Getter temps de la partie
     * 
     * \return int temps de la partie
     */
    public function getTemps() {
        return $this->temps;
    }

    /**
     * \brief Setter identifiant de la partie
     * 
     * \param int $_id_partie identifiant de la partie
     */
    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    /**
     * \brief Setter identifiant utilisateur
     * 
     * \param int $_id_utilisateur identifiant utilisateur
     */
    public function setId_utilisateur($_id_utilisateur) {
        $this->id_utilisateur = $_id_utilisateur;
    }
    
    /**
     * \brief Setter prenom
     * 
     * \param string $_prenom prenom utilisateur
     */
    public function setPrenom($_prenom) {
        $this->prenom = $_prenom;
    }

    /**
     * \brief Setter nom utilisateur
     * 
     * \param string $_nom nom utilisateur
     */
    public function setNom($_nom) {
        $this->nom = $_nom;
    }

    /**
     * \brief Setter nom partie
     * 
     * \param string $_nom_partie nom partie
     */
    public function setNom_partie($_nom_partie) {
        $this->nom_partie = $_nom_partie;
    }

    /**
     * \brief Setter score de la partie
     * 
     * \param int $_score score de la partie
     */
    public function setScore($_score) {
        $this->score = $_score;
    }

    /**
     * \brief Setter temps de la partie
     * 
     * \param int $_temps temps de la partie
     */
    public function setTemps($_temps) {
        $this->temps = $_temps;
    }

}
