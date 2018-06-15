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
 * \file Theme.php
 * \brief Classe conteneur de Theme
 * \author Kévin Le Torc'h <Kévin at kev29lt@gmail.com>
 * \version 1.1
 * \date 07 juin 2018
 */

/**
 * \class Theme
 * 
 * \brief Classe conteneur de Theme
 */
class Theme {
    private $id_theme; /**< \brief identifiant du theme */
    private $nom_theme; /**< \brief nom du thème */
    private $active; /**< \brief indicateur thème désactivé ou non */
    
    /**
     * \brief Assigne les valeurs à l'objet
     * 
     * \param int $_id_theme identifiant du thème
     * \param string $_nom_theme nom du thème
     * \param boolean $_active indicateur thème actif
     */
    public function create($_id_theme, $_nom_theme, $_active){
        $this->setId_theme($_id_theme);
        $this->setNom_theme($_nom_theme);
        $this->setActive($_active);
    }
    
    /**
     * \brief Getter de l'identifiant du thème
     * 
     * \return int identifiant du thème
     */
    public function getId_theme(){
        return $this->id_theme;
    }
    
    /**
     * \brief Getter nom du thème
     * 
     * \return string nom du thème
     */
    public function getNom_theme(){
        return $this->nom_theme;
    }
    
    /**
     * \brief Getter indicateur activité du thème
     * 
     * \return boolean indicateur
     */
    public function getActive(){
        return $this->active;
    }
    
    /**
     * \brief Setter de l'identifiant du thème
     * 
     * \param int $_id_theme identifiant du thème
     */
    public function setId_theme($_id_theme){
        $this->id_theme = $_id_theme;
    }
    
    /**
     * \brief Setter nom thème
     * 
     * \param string $_nom_theme nom thème
     */
    public function setNom_theme($_nom_theme){
        $this->nom_theme = $_nom_theme;
    }
    
    /**
     * \brief Setter indicateur activité du thème
     * 
     * \param boolean $_active indicateur
     */
    public function setActive($_active){
        $this->active = $_active;
    }
}
