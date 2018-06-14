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
 * \file Partie.php
 * \brief Classe conteneur de Partie
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 06 juin 2018
 */

/**
 * \class Partie
 * 
 * \brief Classe conteneur de Partie
 */
class Partie {

    private $id_partie; /**< \brief Identifiant de la partie */
    private $nom_partie; /**< \brief Nom de la partie */

    /**
     * \brief Assigne les valeurs à l'objet Partie
     * 
     * \param int $_id_partie identifiant de la partie
     * \param int $_nom_partie nom de la partie
     */
    public function create($_id_partie, $_nom_partie) {
        $this->setId_partie($_id_partie);
        $this->setNom_partie($_nom_partie);
    }

    /**
     * \brief Renvoie l'objet sous forme de tableau clé => valeur
     * 
     * \return array tableau associatif à l'image de l'objet
     */
    public function toArray() {
        return array(
            'id_partie' => $this->getId_partie(),
            'nom_partie' => $this->getNom_partie()
        );
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
     * \brief Getter du nom de la partie
     * 
     * \return int nom de la partie
     */
    public function getNom_partie() {
        return $this->nom_partie;
    }

    /**
     * \brief Setter de l'identifiant de la partie
     * 
     * \param int $_id_partie identifiant de la partie
     */
    public function setId_partie($_id_partie) {
        $this->id_partie = $_id_partie;
    }

    /**
     * \brief Setter du nom de la partie
     * 
     * \param string $_nom_partie nom de la partie
     */
    public function setNom_partie($_nom_partie) {
        $this->nom_partie = $_nom_partie;
    }

}
